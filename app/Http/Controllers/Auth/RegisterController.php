<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{   
    /**
     * Muestra el formulario de registro.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Registra un nuevo usuario en la base de datos.
     */
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'nombre'            => 'required|max:50',
            'email'             => 'required|email|unique:usuario,email|ends_with:.com,.es',
            'telefono'          => 'nullable|max:15',
            'contrasena'        => 'required|min:6',
            'fecha_inscripcion' => 'required|date',
        ]);

        $usuario = Usuario::create($validatedData);

        Auth::login($usuario); // Iniciar sesión automáticamente al registrarse

        return redirect()->route('inicio')->with('success', 'Usuario creado exitosamente.');
    }
}
