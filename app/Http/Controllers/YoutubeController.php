<?php

namespace App\Http\Controllers;

use App\Services\YoutubeService; // Importa el servicio
use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    protected $youtubeService;

    public function __construct(YouTubeService $youtubeService)
    {
        $this->youtubeService = $youtubeService;
    }

    

    /**
     * Muestra los videos de una playlist permitida.
     *
     * @param string $playlistId La ID de la playlist pasada desde la ruta.
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */

    public function show(string $playlistId = null)
    {
        // caso normal, muestro vídeos de la playlist
        $videos = $this->youtubeService->getVideosFromAllowedPlaylist($playlistId);
        return view('playlists.show', compact('videos','playlistId'));
    }
}