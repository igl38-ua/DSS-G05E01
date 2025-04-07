<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validación de las credenciales
        $credentials = $request->validate([
            'email'    => 'required|email',
            'contrasena' => 'required',
        ]);

        // Mapear el campo 'contrasena' al índice 'password' que espera Auth::attempt
        $loginData = [
            'email'    => $credentials['email'],
            'password' => $credentials['contrasena']
        ];

        if (Auth::attempt($loginData)) {

            $request->session()->regenerate();

            // Verificar el rol y redirigir en consecuencia.
            if (Auth::user()->rol === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } else {
                return redirect()->intended('/');
            }
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son correctas.',
        ]);
    }
}
