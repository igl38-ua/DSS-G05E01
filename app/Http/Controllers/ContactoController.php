<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoMailable;
use App\Models\Contacto; 

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto');
    }

    public function enviar(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'telefono' => 'nullable|string|max:20',
            'asunto' => 'required|string',
            'mensaje' => 'required|string',
        ]);

        Mail::to('smartfitdsscontacto@gmail.com')
            ->send(new ContactoMailable($data));
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