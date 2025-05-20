<?php
namespace App\Services;

class ChatbotResolver
{
    protected $config;

    public function __construct()
    {
        $this->config = config('chatbot');
    }

    protected function preprocess(string $text): array
    {
        $text = mb_strtolower($text, 'UTF-8');
        $text = iconv('UTF-8', 'ASCII//TRANSLIT', $text);
        $tokens = preg_split('/[^a-z0-9_-]+/i', $text, -1, PREG_SPLIT_NO_EMPTY);

        $clean = [];
        foreach ($tokens as $w) {
            if (isset($this->config['synonyms'][$w])) {
                $w = $this->config['synonyms'][$w];
            }
            if (in_array($w, $this->config['stopwords'])) {
                continue;
            }
            $clean[] = $w;
        }
        return $clean;
    }

    /**
     * @return array|null  ['route' => 'name', 'params' => [...]] o null si no hay match
     */
    public function resolve(string $text): ?array
    {
        $tokens = $this->preprocess($text);

        $bestRoute = null;
        $bestScore = 0;
        foreach ($this->config['routes'] as $routeName => $keywords) {
            $score = count(array_intersect($keywords, $tokens));
            if ($score > $bestScore) {
                $bestScore = $score;
                $bestRoute = $routeName;
            }
        }

        if ($bestScore < 1) {
            return null;
        }

        $result = ['route' => $bestRoute, 'params' => []];

        // Si la ruta es playlists.show, siempre usamos el ID por defecto
        if ($bestRoute === 'playlists.show') {
            $result['params']['playlistId'] = $this->config['default_playlist_id'];
        }

            return $result;
        }
}
