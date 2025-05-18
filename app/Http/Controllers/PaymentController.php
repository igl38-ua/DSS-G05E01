<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Services\PaymentGateway;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Muestra el formulario de pago.
     */
    public function showCheckout(int $order)
    {
        $pedido = Pedido::with('usuario')->findOrFail($order);

        if ($pedido->status !== 'pending') {
            return redirect()->route('payment.summary', ['plan' => $pedido->plan]);
        }

        return view('payment.checkout', [
            'pedido'     => $pedido,
            'gatewayKey' => config('payment.gateway_key'),
        ]);
    }

    /**
     * Procesa el pago del pedido.
     */
    public function processPayment(Request $request, int $order)
    {
        $pedido = Pedido::findOrFail($order);
        $user   = Auth::user();

        if ($pedido->ID_Usuario !== $user->id) {
            abort(403);
        }

        // Guarda el método de pago
        $paymentMethod = $request->input('payment_method');
        $pedido->payment_method = $paymentMethod;
        $pedido->save();

        // Procesa el pago (real o simulado)
        $gateway  = new PaymentGateway();
        $response = $gateway->charge([
            'amount'         => $pedido->amount,
            'payment_method' => $paymentMethod,
            'description'    => "Pago plan {$pedido->plan} para usuario {$user->id}",
        ]);

        // Guarda resultado
        $pedido->gateway_response = $response;
        $pedido->status           = $response['status'] === 'success' ? 'paid' : 'failed';
        $pedido->save();

        if ($pedido->status === 'paid') {
            $now = Carbon::now();
            if ($pedido->period === 'annual') {
                $expira = $now->copy()->addYear();
            } else {
                $expira = $now->copy()->addMonth();
            }
            
            $start = $now->toDateString();
            $end   = $now->copy()->addYear()->toDateString();

            $suscripcion = $user->suscripcionActual;       // ← propiedad dinámica

            if ($suscripcion) {
                $suscripcion->update([
                    'plan'             => $pedido->plan,
                    'precio'           => $pedido->amount,
                    'fecha_inicio'     => $start,
                    'fecha_expiracion' => $end,
                ]);
            } else {
                $suscripcion = \App\Models\Suscripcion::create([
                    'ID_Usuario'       => $user->id,
                    'plan'             => $pedido->plan,
                    'precio'           => $pedido->amount,
                    'fecha_inicio'     => $start,
                    'fecha_expiracion' => $end,
                ]);
            }

            // Ahora sí podemos usar $suscripcion->id sin errores
            $user->suscripcion_id = $suscripcion->id;
            $user->save();

            return redirect()->route('payment.success', ['order' => $pedido->id]);
        }

        return redirect()
            ->route('payment.cancel', ['order' => $pedido->id])
            ->with('error', 'Pago fallido, inténtalo de nuevo.');
    }



    public function success(int $order)
    {
        $pedido = Pedido::findOrFail($order);
        return view('payment.success', compact('pedido'));
    }

    public function cancel(int $order)
    {
        $pedido = Pedido::findOrFail($order);
        return view('payment.cancel', compact('pedido'));
    }
}
