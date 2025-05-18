<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoMailable;

class ContactoController extends Controller
{
    public function enviar(Request $request)
    {
        /* 1) VALIDAR y guardar en $datos (o $data) */
        $datos = $request->validate([
            'nombre'   => 'required|string|max:100',
            'email'    => 'required|email',
            'telefono' => 'nullable|string|max:20',
            'asunto'   => 'required|in:membership,classes,trainers,other',
            'mensaje'  => 'required|string|max:2000',
        ]);

        /* 2) ENVIAR el mail usando la misma variable */
        Mail::to('smartfitdsscontacto@gmail.com')
            ->send(new ContactoMailable($datos));

        /* 3) RESPUESTA */
        return back()->with('success', '¡Gracias! Tu mensaje ha sido enviado correctamente.');
    }
}
