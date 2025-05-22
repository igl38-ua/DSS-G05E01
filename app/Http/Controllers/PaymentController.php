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
        $request->validate([
            'card_holder_name' => 'required|string|min:3|max:50',
            'card_number'      => 'required|digits_between:13,19',
            'expiry_date'      => ['required','regex:/^(0[1-9]|1[0-2])\\/\\d{2}$/'],
            'cvv'              => 'required|digits_between:3,4',
        ],[
            'card_holder_name.required'   => 'El nombre del titular es obligatorio.',
            'card_holder_name.min'        => 'El nombre del titular debe tener al menos :min caracteres.',
            'card_holder_name.max'        => 'El nombre del titular no puede exceder de :max caracteres.',

            'card_number.required'        => 'El número de tarjeta es obligatorio.',
            'card_number.digits_between'  => 'El número de tarjeta debe tener 16 dígitos.',

            'expiry_date.required'        => 'La fecha de expiración es obligatoria.',
            'expiry_date.regex'           => 'El formato de la fecha de expiración es inválido. Debe ser MM/AA.',

            'cvv.required'                => 'El CVV es obligatorio.',
            'cvv.digits_between'          => 'El CVV debe tener entre 1 y 3 dígitos.',
        ]);

        $pedido = Pedido::findOrFail($order);
        $user   = Auth::user();

        if ($pedido->ID_Usuario !== $user->id) {
            abort(403);
        }

        // Guarda el método de pago
        $paymentMethod = $request->input('payment_method');
        $pedido->payment_method = $paymentMethod;
        $pedido->save();

        // Procesa el pago 
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

            $suscripcion = $user->suscripcionActual;

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
