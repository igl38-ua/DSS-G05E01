@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-900 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-extrabold text-center text-white mb-10">
            Información del Usuario en Spotify
        </h1>

        @if(isset($userInfo))
            <div class="bg-gray-800 p-6 rounded-lg shadow-md text-white">
                <p class="mb-2">
                    <span class="font-bold">Display Name:</span>
                    {{ $userInfo->display_name ?? 'Desconocido' }}
                </p>
                <p class="mb-2">
                    <span class="font-bold">Email:</span>
                    {{ $userInfo->email ?? 'No disponible' }}
                </p>
                <p class="mb-2">
                    <span class="font-bold">Spotify ID:</span>
                    {{ $userInfo->id ?? 'No disponible' }}
                </p>
                <!-- Agrega aquí más campos si lo necesitas -->
            </div>
        @else
            <div class="bg-red-600 p-6 rounded-lg shadow-md text-white">
                <p>No se recibió información del usuario.</p>
            </div>
        @endif

        <!-- Opcional: Enlace para volver o continuar -->
        <div class="text-center mt-8">
            <a href="{{ route('jam.index') }}" class="text-green-500 text-lg hover:underline">
                Volver a la JAM
            </a>
        </div>
    </div>
</div>
@endsection
