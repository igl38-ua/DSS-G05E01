<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JamQueue; // Suponiendo que ya creaste este modelo
use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;

class JamController extends Controller
{
    // 1) Muestra la cola y el botón/búsqueda
    public function index()
    {
        $songs = JamQueue::orderBy('created_at')->get();
        return view('jam.index', compact('songs'));
    }

    // 2) Formulario para la búsqueda
    public function searchForm()
    {
        // Simplemente retorna la vista con el formulario
        return view('jam.search_form');
    }

    // 3) Procesa la búsqueda en Spotify
    public function search(Request $request)
    {
        // Validamos que el usuario haya ingresado algo
        $request->validate([
            'searchTerm' => 'required|string',
        ]);

        // Recuperamos el término de búsqueda
        $searchTerm = $request->input('searchTerm');

        // Obtenemos el token de acceso de la sesión (o de donde lo guardes)
        $accessToken = session('spotify_access_token');
        if (!$accessToken) {
            // Redirige si no hay token; el usuario debe loguearse con Spotify
            return redirect()->route('spotify.login')->withErrors('Necesitas autenticarte con Spotify');
        }

        // Inicializamos la API de Spotify con el token
        $api = new SpotifyWebAPI();
        $api->setAccessToken($accessToken);

        try {
            // Buscamos canciones (tracks)
            // Puedes ajustar 'limit' a la cantidad de resultados deseada
            $results = $api->search($searchTerm, 'track', [
                'limit' => 10,
            ]);
        } catch (\Exception $e) {
            return back()->withErrors('Hubo un error al buscar: ' . $e->getMessage());
        }

        // Retornamos una vista con los resultados
        // $results->tracks->items es donde vienen las canciones
        return view('jam.search_results', [
            'tracks' => $results->tracks->items ?? [],
            'searchTerm' => $searchTerm,
        ]);
    }

    // 4) Agrega la canción seleccionada a la cola y a la playlist de Spotify
    public function store(Request $request)
    {
        $request->validate([
            'track_uri' => 'required|string',
        ]);

        $trackUri = $request->input('track_uri');

        // Obtenemos el token de acceso
        $accessToken = session('spotify_access_token');
        if (!$accessToken) {
            return redirect()->route('spotify.login')->withErrors('Necesitas autenticarte con Spotify');
        }

        $api = new SpotifyWebAPI();
        $api->setAccessToken($accessToken);

        // 1. Obtener detalles del track (para almacenarlo localmente en jam_queue)
        $segments = explode(':', $trackUri);
        if (count($segments) === 3 && $segments[1] === 'track') {
            $trackId = $segments[2];
        } else {
            return back()->withErrors(['track_uri' => 'La URI de Spotify no parece ser válida.']);
        }

        try {
            $track = $api->getTrack($trackId);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'No se pudo obtener la información del track.']);
        }


        // // Guardarlo en la base de datos
        // JamQueue::create([
        //     'track_uri'    => $trackUri,
        //     'track_name'   => $track->name ?? 'Desconocido',
        //     'track_artist' => isset($track->artists[0]) ? $track->artists[0]->name : 'Desconocido',
        // ]);

        // 2. Agregar la canción a la playlist en Spotify (opcional)
        $playlistId = '5vfq9lcBaUyi5FfoXHMSuv'; // Ajusta con el ID de tu playlist
        try {
            $api->addPlaylistTracks($playlistId, [$trackUri]);

            // Guardarlo en la base de datos
            JamQueue::create([
                'track_uri'    => $trackUri,
                'track_name'   => $track->name ?? 'Desconocido',
                'track_artist' => isset($track->artists[0]) ? $track->artists[0]->name : 'Desconocido',
            ]);

        } catch (\Exception $e) {
            return back()->withErrors(['spotify' => 'Error al agregar la canción a la playlist: ' . $e->getMessage()]);
        }

        return redirect()->route('jam.index')->with('success', 'Canción agregada correctamente a la JAM');
    }
}
