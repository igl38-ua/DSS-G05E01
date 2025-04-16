{{-- resources/views/jam/search_form.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-900 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
        <h1 class="text-4xl font-extrabold text-center text-white mb-10">Buscar Canciones en Spotify</h1>

        @if($errors->any())
            <div class="bg-red-600 text-white px-4 py-3 rounded-md mb-6 max-w-md mx-auto">
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario de búsqueda con estilo Spotify -->
        <form action="{{ route('jam.search') }}" method="POST" class="max-w-md mx-auto bg-gray-800 p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="searchTerm" class="block text-gray-300 font-medium mb-2">
                    Nombre de la canción o artista:
                </label>
                <input type="text" name="searchTerm" id="searchTerm" required
                       class="w-full bg-gray-700 text-white border border-gray-700 rounded-md px-4 py-2 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
            <div class="text-center">
                <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-600 transition-colors">
                    Buscar
                </button>
            </div>
        </form>

        <!-- Sección de sugerencias de música -->
        <div class="max-w-md mx-auto mt-8 bg-gray-800 p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-green-500 mb-4 text-center">Sugerencias de Música</h2>
            <ul class="divide-y divide-gray-700">
                <li class="py-3 px-2 text-white hover:bg-gray-700 transition-colors cursor-pointer">"Shape of You" - Ed Sheeran</li>
                <li class="py-3 px-2 text-white hover:bg-gray-700 transition-colors cursor-pointer">"Blinding Lights" - The Weeknd</li>
                <li class="py-3 px-2 text-white hover:bg-gray-700 transition-colors cursor-pointer">"Levitating" - Dua Lipa</li>
                <li class="py-3 px-2 text-white hover:bg-gray-700 transition-colors cursor-pointer">"Don't Start Now" - Dua Lipa</li>
                <li class="py-3 px-2 text-white hover:bg-gray-700 transition-colors cursor-pointer">"Save Your Tears" - The Weeknd</li>
            </ul>
        </div>

        <!-- Enlace para volver a la JAM -->
        <div class="text-center mt-10">
            <a href="{{ route('jam.index') }}" class="text-green-500 text-lg hover:underline">
                Volver a la JAM
            </a>
        </div>
    </div>
</div>
@endsection
