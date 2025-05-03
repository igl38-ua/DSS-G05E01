<?php

namespace App\Services;

use Google_Client;
use Google_Service_YouTube;
use Exception;
use Illuminate\Support\Facades\Log; // Para registrar errores

class YouTubeService
{
    protected $client;
    protected $youtube;
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('YOUTUBE_API_KEY');

        if (empty($this->apiKey)) {
             Log::error('YOUTUBE_API_KEY no est� configurada en el archivo .env');
             // Decide c�mo manejar esto: lanzar excepci�n, devolver null, etc.
             // throw new Exception('YOUTUBE_API_KEY no configurada.');
             return; // O simplemente no instancies el cliente si falta la clave
        }

        $this->client = new Google_Client();
        $this->client->setDeveloperKey($this->apiKey);

        // Manejo de errores de cliente (Opcional pero �til en local)
        // $this->client->setHttpClient(new \GuzzleHttp\Client(['verify' => false]));

        $this->youtube = new Google_Service_YouTube($this->client);
    }

    /**
     * Obtiene videos de una lista de reproducci�n espec�fica si est� permitida.
     * Usa la API Key configurada.
     *
     * @param string $playlistId La ID de la playlist de YouTube.
     * @param int $maxResults N�mero m�ximo de v�deos a obtener.
     * @return array Lista de v�deos o array vac�o en caso de error/no permitido.
     */
    public function getVideosFromAllowedPlaylist(string $playlistId, ?int $maxResults = null): array
    {
        // 1. Verifica si el servicio se inicializ� correctamente (tiene API Key)
        if (!$this->youtube) {
             Log::error('Intento de usar YouTubeService sin inicializar (falta API Key?).');
             return [];
        }

        // 2. Verifica si la Playlist ID est� en la lista permitida del config
        $allowedPlaylists = config('youtube.allowed_playlists', []); // Obtiene del config, default array vac�o
        if (!in_array($playlistId, $allowedPlaylists)) {
            Log::warning("Intento de acceso a playlist no permitida: {$playlistId}");
            return []; // No est� permitida, devuelve vac�o
        }

        // 3. Define cu�ntos resultados traer
        $limit = $maxResults ?? config('youtube.max_results_per_playlist', 10); // Usa el par�metro o el default del config

        try {
            // 4. Llama a la API para obtener los elementos de la playlist
            $playlistItemsResponse = $this->youtube->playlistItems->listPlaylistItems('snippet', [
                'playlistId' => $playlistId,
                'maxResults' => $limit,
                 // 'pageToken' => $nextPageToken, // Para paginaci�n si necesitas m�s resultados
            ]);

            // 5. Devuelve los items (v�deos)
            return $playlistItemsResponse['items'] ?? [];

        } catch (Exception $e) {
            // Maneja el error (registra, devuelve vac�o, etc.)
            Log::error("Error al obtener v�deos de playlist {$playlistId}: " . $e->getMessage());
            // report($e); // Tambi�n puedes usar el helper report()
            return [];
        }
    }

     // Puedes mantener los otros m�todos (searchVideos, getMyChannels) si tambi�n los necesitas,
     // pero aseg�rate de que su l�gica de autenticaci�n sea la correcta para cada caso (API Key o OAuth).
}