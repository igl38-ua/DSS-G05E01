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

        // 1) Configura la sesión de Spotify con tus credenciales
        $session = new Session(
            env('SPOTIFY_CLIENT_ID'),
            env('SPOTIFY_CLIENT_SECRET'),
            env('SPOTIFY_REDIRECT_URI')
        );

        // 2) Intercambia el "code" por tokens
        $session->requestAccessToken($request->get('code'));
        $accessToken  = $session->getAccessToken();
        $refreshToken = $session->getRefreshToken();  // ← aquí capturas el refresh token

        // 3) Opcional: almacena ambos tokens de forma permanente
        //    a) En base de datos: guardas en un registro tuyo (por ejemplo, en tabla settings)
        //    b) O si lo prefieres en .env (no automático, copia manualmente):
        //       SPOTIFY_REFRESH_TOKEN=<?=  $refreshToken  
        //
        // Ejemplo guardando en session (temporal) y luego tú mueves el refresh token a .env:
        session([
            'spotify_access_token'  => $accessToken,
            'spotify_refresh_token' => $refreshToken,
        ]);

        // 4) Inicializa el cliente con el access token para esta petición
        $api = new SpotifyWebAPI();
        $api->setAccessToken($accessToken);

        // 5) Obtén info del usuario (opcional)
        $userInfo = $api->me();

        return view('spotify.callback', compact('userInfo'));
    }

}
