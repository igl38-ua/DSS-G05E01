@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-8">
    <h1 class="text-3xl font-bold text-center mb-8">JAM de Música</h1>

    <!-- Botón para ir a buscar canciones -->
    <div class="text-center mb-8">
        <a href="{{ route('jam.search.form') }}" class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600 transition-colors">
            Buscar canciones en Spotify
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-500 text-white px-4 py-2 rounded-md mb-4 text-center">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-500 text-white px-4 py-2 rounded-md mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Lista de canciones de la cola
    <h2 class="text-2xl font-bold mb-4">Cola de Canciones</h2>
    @if($songs->isEmpty())
        <p class="text-gray-700">No hay canciones agregadas aún.</p>
    @else
        <ul class="divide-y divide-gray-200">
            @foreach($songs as $song)
                <li class="py-4">
                    <div class="font-semibold text-lg">{{ $song->track_name }}</div>
                    <div class="text-gray-600">{{ $song->track_artist }}</div>
                    <small class="text-gray-500">{{ $song->track_uri }}</small>
                </li>
            @endforeach
        </ul>
    @endif -->  

    <!-- Incrustar la playlist de Spotify -->
    <div class="mt-8 text-center">
        <h2 class="text-2xl font-bold mb-4">Escucha la Playlist en Spotify</h2>
        <iframe src="https://open.spotify.com/embed/playlist/5vfq9lcBaUyi5FfoXHMSuv" 
                width="900" height="500" frameborder="0" allowtransparency="true" allow="encrypted-media" 
                class="mx-auto"></iframe>
    </div>
</div>
@endsection
