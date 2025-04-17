<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario; // Importa el modelo Usuario
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Para manejar la autenticación
use Illuminate\Support\Facades\Hash; // Para hashear passwords si es necesario
use Illuminate\Support\Str;          // Para generar strings aleatorios si es necesario
use Laravel\Socialite\Facades\Socialite; // Importa Socialite
use Exception; // Para capturar errores

class GoogleController extends Controller
{
    /**
     * Redirige al usuario a la página de autenticación de Google.
     */
    public function redirectToGoogle()
    {
        // Simplemente redirige al driver 'google' configurado en services.php
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtiene la información del usuario de Google y maneja el login/registro.
     */
    public function handleGoogleCallback()
    {
        try {
            // Obtiene la información del usuario de Google
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Busca si ya existe un usuario con ese Google ID
            $user = Usuario::where('google_id', $googleUser->getId())->first();

            if ($user) {
                // Si el usuario existe, inicia sesión
                Auth::login($user);
                return redirect('/dashboard'); // O a donde quieras redirigir después del login
                
            } else {
                // Si no existe, busca por email por si ya estaba registrado
                $user = Usuario::where('email', $googleUser->getEmail())->first();

                if ($user) {
                    // Si existe por email, actualiza su google_id y avatar, luego inicia sesión
                    $user->update([
                        'google_id' => $googleUser->getId(),
                        'avatar' => $googleUser->getAvatar(),
                    ]);
                } else {
                    // Si no existe ni por google_id ni por email, crea un nuevo usuario
                    $user = Usuario::create([
                        'nombre' => $googleUser->getName(),
                        'email' => $googleUser->getEmail(),
                        'google_id' => $googleUser->getId(),
                        'avatar' => $googleUser->getAvatar(),
                        'rol' => 'user',
                        'fecha_inscripcion' => now(), 
                        'password' => Hash::make(Str::random(24))
                        // Opcional: Si tu tabla 'password' NO es nullable, genera una:
                        // 'password' => Hash::make(Str::random(24))
                    ]);
                }

                // Inicia sesión con el usuario encontrado/creado
                Auth::login($user);
                return redirect('/dashboard'); // O a donde quieras redirigir
            }

        } catch (Exception $e) {
            \Log::error($e);          // guarda todo en storage/logs/laravel.log
            return redirect('/login')->with('error', $e->getMessage());
        }
        
        
    }
}