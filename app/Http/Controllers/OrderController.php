<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Muestra el resumen del pedido antes del pago.
     */
    public function showSummary(Request $request, string $plan)
    {
        $user = Auth::user();

        // Precios definidos para cada plan
        $prices = [
            'basico'  => 24.99,
            'dorado'  => 34.99,
            'platino' => 44.99,
        ];

        if (! array_key_exists($plan, $prices)) {
            abort(404);
        }

        // lee period: monthly o annual (default monthly)
        $period = $request->query('period','monthly');
        if (!in_array($period, ['monthly','annual'])) {
            $period = 'monthly';
        }

        // calcula amount según period
        if ($period === 'annual') {
            $amount = round($prices[$plan] * 12 * (1 - 0.2), 2);
            // opcional: precio equivalente al mes
            $monthlyEquivalent = round($prices[$plan] * (1 - 0.2), 2);
        } else {
            $amount = $prices[$plan];
            $monthlyEquivalent = null;
        }

        return view('payment.summary', compact(
        'user','plan','period','amount','monthlyEquivalent'
        ));
    }

    /**
     * Crea el pedido en base de datos y redirige al checkout.
     */
    public function createOrder(Request $request, string $plan)
    {
        $user = Auth::user();
        $prices = [
            'basico'  => 24.99,
            'dorado'  => 34.99,
            'platino' => 44.99,
        ];
        $period = $request->input('period','monthly');

        if (! array_key_exists($plan, $prices)) {
            abort(404);
        }

        $pedido = Pedido::create([
            'ID_Usuario' => $user->id,
            'plan'       => $plan,
            'amount'     => $prices[$plan] * ($period==='annual' ? 12*(1-0.2) : 1),
            'period'     => $period,
            'status'     => 'pending',
        ]);

        return redirect()->route('payment.checkout', ['order' => $pedido->id]);
    }
}
