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
        $session = new Session(
            env('SPOTIFY_CLIENT_ID'),
            env('SPOTIFY_CLIENT_SECRET'),
            route('spotify.callback') // Asegúrate de que este URI esté registrado en el dashboard
        );

        $options = [
            'scope' => [
                'user-read-email',
                // Añade otros scopes que necesites
            ],
        ];

        // Redirige al usuario a la URL de autorización de Spotify
        return redirect($session->getAuthorizeUrl($options));
    }

    // Maneja el callback de Spotify
    public function handleSpotifyCallback(Request $request)
    {
        $session = new Session(
            env('SPOTIFY_CLIENT_ID'),
            env('SPOTIFY_CLIENT_SECRET'),
            route('spotify.callback')
        );

        $api = new SpotifyWebAPI();

        if ($request->has('code')) {
            // Solicita el token de acceso usando el código de autorización
            $session->requestAccessToken($request->get('code'));
            $accessToken = $session->getAccessToken();
            $api->setAccessToken($accessToken);

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
