@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-extrabold text-center text-black mb-10">JAM de Música</h1>

        <!-- Botón para ir a buscar canciones -->
        <div class="text-center mb-8">
            <a href="{{ route('jam.search.form') }}" class="bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-600 transition-colors">
                + Añade una canción
            </a>
        </div>

        <!-- Mensajes de éxito -->
        @if(session('success'))
            <div class="bg-green-600 text-white px-4 py-3 rounded-md mb-6 text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- Mensajes de error -->
        @if($errors->any())
            <div class="bg-red-600 text-white px-4 py-3 rounded-md mb-6">
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Opción: Aquí podrías descomentar la lista de canciones de la cola, si la quieres mostrar -->
        {{-- 
        <h2 class="text-2xl font-bold text-white mb-4">Cola de Canciones</h2>
        @if($songs->isEmpty())
            <p class="text-gray-400">No hay canciones agregadas aún.</p>
        @else
            <ul class="divide-y divide-gray-700">
                @foreach($songs as $song)
                    <li class="py-4">
                        <div class="font-semibold text-lg text-white">{{ $song->track_name }}</div>
                        <div class="text-gray-400">{{ $song->track_artist }}</div>
                        <small class="text-gray-500">{{ $song->track_uri }}</small>
                    </li>
                @endforeach
            </ul>
        @endif 
        --}}

        <!-- Incrustar la playlist de Spotify -->
        <div class="mt-8 text-center">
            <h2 class="text-2xl font-bold text-green-500 mb-4">🎵 Escucha nuestra Playlist en Spotify 🎵</h2>
            <div class="relative" style="padding-bottom: 76.25%; height: 0; overflow: hidden;">
                <iframe src="https://open.spotify.com/embed/playlist/5vfq9lcBaUyi5FfoXHMSuv" 
                        frameborder="0" allowtransparency="true" allow="encrypted-media"
                        class="absolute top-0 left-0 w-full h-full"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection
