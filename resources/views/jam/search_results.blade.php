@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-900 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-extrabold text-center text-white mb-10">
            Resultados de búsqueda para: <span class="text-green-500">{{ $searchTerm }}</span>
        </h1>

        @if($errors->any())
            <div class="bg-red-600 text-white px-4 py-3 rounded-md mb-6">
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(count($tracks) === 0)
            <p class="text-gray-400 text-center">No se encontraron resultados.</p>
        @else
            <ul class="bg-gray-800 p-6 rounded-lg shadow-md divide-y divide-gray-700">
                @foreach($tracks as $track)
                    <li class="py-4 flex justify-between items-center">
                        <div class="flex items-center">
                            <!-- Icono de la canción: portada del álbum -->
                            @if(isset($track->album->images) && count($track->album->images) > 0)
                                <img src="{{ $track->album->images[0]->url }}" alt="Portada de {{ $track->name }}" 
                                     class="w-12 h-12 mr-4 rounded-sm object-cover">
                            @else
                                <!-- Icono de fallback (puedes personalizarlo) -->
                                <svg class="w-12 h-12 mr-4 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0a12 12 0 100 24 12 12 0 000-24zm0 18a6 6 0 116-6 6 6 0 01-6 6z"/>
                                </svg>
                            @endif

                            <div>
                                <div class="font-semibold text-lg text-white">{{ $track->name }}</div>
                                <div class="text-gray-400">
                                    {{ isset($track->artists[0]) ? $track->artists[0]->name : 'Desconocido' }}
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('jam.store') }}" method="POST" class="ml-4">
                            @csrf
                            <input type="hidden" name="track_uri" value="{{ $track->uri }}">
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition-colors">
                                Agregar
                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif

        <div class="text-center mt-10">
            <a href="{{ route('jam.index') }}" class="text-green-500 text-lg hover:underline">
                Volver a la JAM
            </a>
        </div>
    </div>
</div>
@endsection
