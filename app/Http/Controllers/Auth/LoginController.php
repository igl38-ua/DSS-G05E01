<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validar campos de entrada
        $credentials = $request->validate([
            'email'    => 'required|email',
            'contrasena' => 'required',
        ]);

        // Intentar autenticar al usuario usando las credenciales
        if (Auth::attempt($credentials)) {
            // Regenerar la sesión para prevenir fijación de sesión
            $request->session()->regenerate();

            // Redirigir al usuario a su página de destino (por ejemplo, dashboard)
            return redirect()->intended('dashboard');
        }

        // Si falla la autenticación, redirigir atrás con mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son correctas.',
        ]);
    }
}
