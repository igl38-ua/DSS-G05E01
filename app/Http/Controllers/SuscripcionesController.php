<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suscripcion;

class SuscripcionesController extends Controller
{
    public function index() {
        return view('suscripciones');
    }

    public function confirmCancel(int $id)
    {
        $sub = Suscripcion::findOrFail($id);

        // Opcional: verificar que el sub->ID_Usuario coincide con Auth::id()
        abort_unless($sub->ID_Usuario === auth()->id(), 403);

        return view('suscripciones.confirm_cancel', compact('sub'));
    }

    public function cancel(int $id)
    {
        $sub = Suscripcion::findOrFail($id);
        abort_unless($sub->ID_Usuario === auth()->id(), 403);

        // Elimina o marca como cancelada
        $sub->delete();
        $user = auth()->user();
        if ($user->suscripcion_id === $sub->id) {
            $user->suscripcion_id = null;
            $user->save();
        }
        
        return redirect()
            ->route('suscripciones')
            ->with('success', 'Suscripción cancelada correctamente.');
}

}
