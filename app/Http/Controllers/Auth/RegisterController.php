<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{   
    /**
     * Muestra el formulario de registro.
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Registra un nuevo usuario en la base de datos.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre'            => 'required|max:50',
            'email'             => 'required|email|ends_with:.com,.es',
            'telefono'          => 'nullable|max:15',
            'password'          => 'required|min:6',
        ]);

        $validatedData['fecha_inscripcion'] = now()->format('Y-m-d');
        $validatedData['rol'] = 'user';
        $validatedData['password'] = bcrypt($validatedData['password']);

        $usuario = Usuario::create($validatedData);

        // Auth::login($usuario); // Iniciar sesión automáticamente al registrarse

        return redirect()->route('inicio')->with('success', 'Usuario creado exitosamente.');
    }
}
