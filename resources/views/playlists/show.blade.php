{{-- resources/views/playlists/show.blade.php --}}
@extends('layouts.app') {{-- O tu layout base --}}

@section('content')
<div class="flex-grow px-20 py-20">
<div class="container mx-auto px-4 py-8">

    <h1 class="text-2xl font-bold mb-6">V�deos de la Playlist</h1>
    {{-- Puedes obtener el t�tulo de la playlist haciendo otra llamada API si quieres --}}
    {{-- <p class="mb-4 text-gray-600">Playlist ID: {{ $playlistId }}</p> --}}

    @if (!empty($videos))
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($videos as $video)
                @php
                    // Accede a la informaci�n del v�deo dentro de 'snippet'
                    $snippet = $video['snippet'];
                    $videoId = $snippet['resourceId']['videoId'] ?? null; // ID del v�deo real
                    $title = $snippet['title'];
                    $thumbnailUrl = $snippet['thumbnails']['medium']['url'] ?? $snippet['thumbnails']['default']['url'] ?? ''; // Thumbnail mediano o default
                    $videoUrl = $videoId ? "https://www.youtube.com/watch?v={$videoId}" : '#';
                @endphp

                @if($videoId) {{-- Asegura que tengamos una ID de v�deo v�lida --}}
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <a href="{{ $videoUrl }}" target="_blank" rel="noopener noreferrer">
                        @if($thumbnailUrl)
                        <img src="{{ $thumbnailUrl }}" alt="{{ $title }}" class="w-full h-40 object-cover">
                        @else
                        <div class="w-full h-40 bg-gray-200 flex items-center justify-center text-gray-500">Sin Miniatura</div>
                        @endif
                    </a>
                    <div class="p-4">
                        <h3 class="font-semibold text-md mb-2">
                             <a href="{{ $videoUrl }}" target="_blank" rel="noopener noreferrer" class="hover:text-purple-600">{{ $title }}</a>
                        </h3>
                        {{-- <p class="text-gray-600 text-sm">{{ \Illuminate\Support\Str::limit($snippet['description'], 80) }}</p> --}}
                         {{-- Puedes a�adir m�s detalles si quieres, como la fecha de publicaci�n --}}
                         {{-- <p class="text-xs text-gray-500 mt-2">Publicado: {{ \Carbon\Carbon::parse($snippet['publishedAt'])->isoFormat('LL') }}</p> --}}
                    </div>
                </div>
                @endif
            @endforeach
        </div>
        {{-- Aqu� podr�as a�adir l�gica de paginaci�n si implementaste pageToken --}}
    @else
        <p class="text-center text-gray-500">No se encontraron v�deos en esta playlist o no est� permitida.</p>
    @endif

</div>
</div>
@endsection