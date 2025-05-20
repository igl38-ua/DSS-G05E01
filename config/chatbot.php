<?php
return [
    'routes' => [
        'inicio' => [
            'inicio', 'home', 'principal', 'bienvenida',
            'portada', 'entrada', 'panel',
            'resumen', 'portal', 'frontpage', 'vitrina'
        ],
        'clases' => [
            'horarios', 'clases', 'agenda', 'calendario',
            'yoga', 'spinning', 'pilates', 'crossfit',
            'zumba', 'boxeo', 'cardio', 'funcional',
            'HIIT', 'ciclismo'
        ],
        'entrenadores.index' => [
            'reservas', 'reservar', 'book', 'agendar',
            'coach', 'entrenador', 'instructor',
            'sesión', 'consulta',
            'asesor'
        ],
        'foro.index' => [
            'foro', 'foros', 'comunidad', 'chat',
            'debate', 'discusión', 'mensaje', 'post',
            'hilo', 'tema', 'grupo', 'colaboracion'
        ],
        'playlists.show' => [
            'rutina', 'rutinas', 'ejercicio', 'plan',
            'playlists', 'playlist', 'videos', 'calentamiento',
            'enfriamiento', 'serie', 'repeticiones'
        ],
        'suscripciones' => [
            'suscripciones', 'planes', 'membresia', 'premium',
            'plan', 'mensual', 'anual', 'paquete', 'tarifa',
            'pago', 'facturación', 'renovacion'
        ],
        'contacto' => [
            'contacto', 'soporte', 'ayuda', 'escribir',
            'email', 'telefono', 'formulario',
            'feedback', 'consultas', 'contactar'
        ],
        'help' => [
            'help', 'faq', 'preguntas', 'dudas',
            'tutorial', 'guía', 'asistencia', 'manual',
            'centrodeayuda', 'documentación', 'instrucciones', 'tips'
        ],
        'jam.index' => [
            'spotify', 'jam', 'musica',
            'canciones', 'melodias', 'ritmo', 'beats',
            'pistas', 'audio', 'mix', 'sonidos'
        ],
        'dashboard' => [
            'perfil', 'usuario', 'cuenta', 'settings',
            'configuracion', 'ajustes', 'seguridad', 'notificaciones',
            'estadísticas', 'historial', 'privacidad', 'misdatos'
        ],
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
