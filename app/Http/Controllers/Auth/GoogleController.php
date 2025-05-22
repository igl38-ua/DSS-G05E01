<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class GoogleController extends Controller
{
    /**
     * Redirige al usuario a la p�gina de autenticaci�n de Google.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtiene la informaci�n del usuario de Google y maneja el login/registro.
     */
    public function handleGoogleCallback()
    {
        try {
            // Obtiene la informaci�n del usuario de Google
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Busca si ya existe un usuario con ese Google ID
            $user = Usuario::where('google_id', $googleUser->getId())->first();

            if ($user) {
                // Si el usuario existe, inicia sesi�n
                Auth::login($user);
                return redirect('/dashboard'); 
                
            } else {
                // Si no existe, busca por email por si ya estaba registrado
                $user = Usuario::where('email', $googleUser->getEmail())->first();

                if ($user) {
                    // Si existe por email, actualiza su google_id y avatar, luego inicia sesi�n
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
                    ]);
                }

                // Inicia sesi�n con el usuario encontrado/creado
                Auth::login($user);
                return redirect('/dashboard');
            }

        } catch (Exception $e) {
            \Log::error($e);
            return redirect('/login')->with('error', $e->getMessage());
        }
        
        
    }
}