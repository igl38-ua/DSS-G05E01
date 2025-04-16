@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-8">
    <h1 class="text-3xl font-bold text-center mb-8">Buscar Canciones en Spotify</h1>

    @if($errors->any())
        <div class="bg-red-500 text-white px-4 py-2 rounded-md mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jam.search') }}" method="POST" class="max-w-md mx-auto">
        @csrf
        <div class="mb-4">
            <label for="searchTerm" class="block text-gray-700 font-semibold mb-2">
                Nombre de la canción o artista:
            </label>
            <input type="text" name="searchTerm" id="searchTerm" required
                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-indigo-500">
        </div>
        <div class="text-center">
            <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600 transition-colors">
                Buscar
            </button>
        </div>
    </form>

    <div class="text-center mt-8">
        <a href="{{ route('jam.index') }}" class="text-indigo-500 hover:underline">
            Volver a la JAM
        </a>
    </div>
</div>
@endsection
