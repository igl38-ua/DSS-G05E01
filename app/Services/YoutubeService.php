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
             Log::error('YOUTUBE_API_KEY no está configurada en el archivo .env');
             // Decide cómo manejar esto: lanzar excepción, devolver null, etc.
             // throw new Exception('YOUTUBE_API_KEY no configurada.');
             return; // O simplemente no instancies el cliente si falta la clave
        }

        $this->client = new Google_Client();
        $this->client->setDeveloperKey($this->apiKey);

        // Manejo de errores de cliente (Opcional pero útil en local)
        // $this->client->setHttpClient(new \GuzzleHttp\Client(['verify' => false]));

        $this->youtube = new Google_Service_YouTube($this->client);
    }

    /**
     * Obtiene videos de una lista de reproducción específica si está permitida.
     * Usa la API Key configurada.
     *
     * @param string $playlistId La ID de la playlist de YouTube.
     * @param int $maxResults Número máximo de vídeos a obtener.
     * @return array Lista de vídeos o array vacío en caso de error/no permitido.
     */
    public function getVideosFromAllowedPlaylist(string $playlistId, ?int $maxResults = null): array
    {
        // 1. Verifica si el servicio se inicializó correctamente (tiene API Key)
        if (!$this->youtube) {
             Log::error('Intento de usar YouTubeService sin inicializar (falta API Key?).');
             return [];
        }

        // 2. Verifica si la Playlist ID está en la lista permitida del config
        $allowedPlaylists = config('youtube.allowed_playlists', []); // Obtiene del config, default array vacío
        if (!in_array($playlistId, $allowedPlaylists)) {
            Log::warning("Intento de acceso a playlist no permitida: {$playlistId}");
            return []; // No está permitida, devuelve vacío
        }

        // 3. Define cuántos resultados traer
        $limit = $maxResults ?? config('youtube.max_results_per_playlist', 10); // Usa el parámetro o el default del config

        try {
            // 4. Llama a la API para obtener los elementos de la playlist
            $playlistItemsResponse = $this->youtube->playlistItems->listPlaylistItems('snippet', [
                'playlistId' => $playlistId,
                'maxResults' => $limit,
                 // 'pageToken' => $nextPageToken, // Para paginación si necesitas más resultados
            ]);

            // 5. Devuelve los items (vídeos)
            return $playlistItemsResponse['items'] ?? [];

        } catch (Exception $e) {
            // Maneja el error (registra, devuelve vacío, etc.)
            Log::error("Error al obtener vídeos de playlist {$playlistId}: " . $e->getMessage());
            // report($e); // También puedes usar el helper report()
            return [];
        }
    }

     // Puedes mantener los otros métodos (searchVideos, getMyChannels) si también los necesitas,
     // pero asegúrate de que su lógica de autenticación sea la correcta para cada caso (API Key o OAuth).
}