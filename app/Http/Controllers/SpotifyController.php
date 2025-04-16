<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;

class SpotifyController extends Controller
{
    // Inicia el proceso de autenticación redirigiendo a Spotify
    public function redirectToSpotify()
    {
        session()->forget('spotify_access_token');
        
        $session = new Session(
            env('SPOTIFY_CLIENT_ID'),
            env('SPOTIFY_CLIENT_SECRET'),
            env('SPOTIFY_REDIRECT_URI')
        );

        $options = [
            'scope' => [
                'user-read-email',
                'playlist-modify-public',
                'user-modify-playback-state',
                'user-read-currently-playing',
            ],
        ];

        // Redirige al usuario a la URL de autorización de Spotify
        return redirect($session->getAuthorizeUrl($options));
    }

    // Maneja el callback de Spotify
    public function handleSpotifyCallback(Request $request)
    {
        if (!$request->has('code')) {
            dd('No llegó el parámetro "code".');
        }

        $session = new Session(
            env('SPOTIFY_CLIENT_ID'),
            env('SPOTIFY_CLIENT_SECRET'),
            env('SPOTIFY_REDIRECT_URI')
        );

        $api = new SpotifyWebAPI();

        if ($request->has('code')) {
            // Solicita el token de acceso usando el código de autorización
            $session->requestAccessToken($request->get('code'));
            $accessToken = $session->getAccessToken();
            $api->setAccessToken($accessToken);

            session(['spotify_access_token' => $accessToken]);
            
            // Obtén la información del usuario logueado en Spotify
            $userInfo = $api->me();

            // Opcional: Puedes almacenar $accessToken y $userInfo en la sesión o base de datos para usos posteriores

            // Por ejemplo, si deseas mostrar una vista con los datos del usuario
            return view('spotify.callback', compact('userInfo'));
        }

        // En caso de error, redirige a una ruta de error o al login
        return redirect()->route('spotify.login');
    }
}
