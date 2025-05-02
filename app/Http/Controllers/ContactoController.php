<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto');
    }

    public function enviar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'telefono' => 'nullable|string|max:20',
            'asunto' => 'required|string',
            'mensaje' => 'required|string',
        ]);

        return redirect()->route('contacto')->with('success', '¡Gracias! Tu mensaje ha sido enviado correctamente.');
    }

    public function enviarPregunta(Request $request)
    {
        $request->validate([
            'faqEmail' => 'required|email',
            'faqQuestion' => 'required|string',
        ]);

        return redirect()->route('contacto')->with('faq_success', '¡Gracias! Te responderemos pronto.');
    }
}