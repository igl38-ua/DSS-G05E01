<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JamQueue;
use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;

class JamController extends Controller
{
    /**
     * Crea y devuelve un cliente SpotifyWebAPI con token recién renovado.
     */
    protected function getSpotifyApi(): SpotifyWebAPI
    {
        $session = new Session(
            env('SPOTIFY_CLIENT_ID'),
            env('SPOTIFY_CLIENT_SECRET'),
            env('SPOTIFY_REDIRECT_URI')
        );

        // Usa el refresh token que guardaste en .env
        $session->setRefreshToken(env('SPOTIFY_REFRESH_TOKEN'));

        // Renueva el access token
        $session->refreshAccessToken();
        $api = new SpotifyWebAPI();
        $api->setAccessToken($session->getAccessToken());

        return $api;
    }

    // 1) Muestra la cola y el botón/búsqueda
    public function index()
    {
        $songs = JamQueue::orderBy('created_at')->get();
        return view('jam.index', compact('songs'));
    }

    // 2) Formulario para la búsqueda
    public function searchForm()
    {
        return view('jam.search_form');
    }

    // 3) Procesa la búsqueda en Spotify
    public function search(Request $request)
    {
        $request->validate([
            'searchTerm' => 'required|string',
        ]);

        $api = $this->getSpotifyApi();

        try {
            $results = $api->search($request->input('searchTerm'), 'track', [
                'limit' => 10,
            ]);
        } catch (\Exception $e) {
            return back()->withErrors('Error al buscar: ' . $e->getMessage());
        }

        return view('jam.search_results', [
            'tracks'     => $results->tracks->items ?? [],
            'searchTerm' => $request->input('searchTerm'),
        ]);
    }

    // 4) Agrega la canción seleccionada a la cola y a la playlist de Spotify
    public function store(Request $request)
    {
        $request->validate([
            'track_uri' => 'required|string',
        ]);

        $trackUri = $request->input('track_uri');

        // Valida el formato spotify:track:ID
        $parts = explode(':', $trackUri);
        if (count($parts) !== 3 || $parts[1] !== 'track') {
            return back()->withErrors(['track_uri' => 'URI de Spotify no válida.']);
        }
        $trackId = $parts[2];

        $api = $this->getSpotifyApi();

        // Obtiene datos del track (opcionalmente para guardar en BD)
        try {
            $track = $api->getTrack($trackId);
        } catch (\Exception $e) {
            return back()->withErrors('No se pudo obtener información del track.');
        }

        // Para cambiar la playlist en base al id
        $playlistId = '5vfq9lcBaUyi5FfoXHMSuv';
        try {
            $api->addPlaylistTracks($playlistId, [$trackUri]);
        } catch (\Exception $e) {
            return back()->withErrors('Error al añadir a la playlist: ' . $e->getMessage());
        }

        // Guarda en la cola local
        JamQueue::create([
            'track_uri'    => $trackUri,
            'track_name'   => $track->name,
            'track_artist' => $track->artists[0]->name ?? 'Desconocido',
        ]);

        return redirect()->route('jam.index')
                         ->with('success', 'Canción añadida correctamente a la JAM');
    }
}
