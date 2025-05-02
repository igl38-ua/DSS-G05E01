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
        session()->forget('spotify_refresh_token');
        
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
        if (! $request->has('code')) {
            dd('No llegó el parámetro "code".');
        }

        $session = new Session(
            env('SPOTIFY_CLIENT_ID'),
            env('SPOTIFY_CLIENT_SECRET'),
            env('SPOTIFY_REDIRECT_URI')
        );

        // Intercambia el código por tokens
        $session->requestAccessToken($request->get('code'));
        $accessToken  = $session->getAccessToken();
        $refreshToken = $session->getRefreshToken();

    }

}
