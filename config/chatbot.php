<?php
return [
    'routes' => [
        'inicio'                => ['inicio','home','principal','bienvenida'],
        'clases'                    => ['horarios','clases','agenda','calendario'],
        'entrenadores.index'        => ['reservas','reservar','book','agendar'],
        'foro.index'         => ['foro','foros','comunidad','chat'],
        'playlists.show'      => ['rutina','rutinas','ejercicio','plan','playlists','vídeos'],
        'suscripciones' => ['suscripciones','planes','membresía','premium'],
        'contacto'      => ['contacto','soporte','ayuda','escribir'],
        'help'          => ['help','faq','preguntas','dudas'],
        'jam.index'   => ['spotify','jam','música','playlist'],
        'dashboard'        => ['perfil','usuario','cuenta','settings'],
    ],
    'default_playlist_id' => 'PLz-l7oWFJS0JpFK3d3qSGbMSpcKjZgQI6',
    'synonyms' => [
        'agenda'    => 'horarios',
        'book'      => 'reservas',
        'membresia' => 'suscripciones',
        'stats'     => 'estadísticas',
    ],
    'stopwords' => ['el','la','los','las','un','una','de','y','o','que','con','para','por','en','mi','su'],
];
