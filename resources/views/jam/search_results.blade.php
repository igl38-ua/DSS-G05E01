@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-8">
    <h1 class="text-3xl font-bold text-center mb-8">
        Resultados de búsqueda para: <span class="text-indigo-600">{{ $searchTerm }}</span>
    </h1>

    @if($errors->any())
        <div class="bg-red-500 text-white px-4 py-2 rounded-md mb-4">
            <ul>
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(count($tracks) === 0)
        <p class="text-gray-700 text-center">No se encontraron resultados.</p>
    @else
        <ul class="divide-y divide-gray-200">
            @foreach($tracks as $track)
                <li class="py-4 flex justify-between items-center">
                    <div>
                        <div class="font-semibold text-lg">{{ $track->name }}</div>
                        <div class="text-gray-600">
                            Artista: {{ isset($track->artists[0]) ? $track->artists[0]->name : 'Desconocido' }}
                        </div>
                        <small class="text-gray-500">{{ $track->uri }}</small>
                    </div>
                    <form action="{{ route('jam.store') }}" method="POST" class="ml-4">
                        @csrf
                        <input type="hidden" name="track_uri" value="{{ $track->uri }}">
                        <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-600 transition-colors">
                            Agregar
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif

    <div class="text-center mt-8">
        <a href="{{ route('jam.index') }}" class="text-indigo-500 hover:underline">
            Volver a la JAM
        </a>
    </div>
</div>
@endsection
