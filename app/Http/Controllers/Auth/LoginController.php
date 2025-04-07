<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario; 

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validated = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // Validar las credenciales sin iniciar sesión
        if (Auth::validate($credentials)) {
            $user = Usuario::where('email', $credentials['email'])->first();

            if ($user) {
                Auth::login($user);
                $request->session()->regenerate();

                if ($user->rol === 'admin') {
                    return redirect()->intended('/admin');
                } else {
                    return redirect()->intended('/');
                }
            }
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son correctas.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
