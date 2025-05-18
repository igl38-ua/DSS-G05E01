<!-- resources/views/suscripciones/confirm_cancel.blade.php -->
@extends('layouts.app')

@section('content')
<div class="flex-grow px-20 py-20">
    <div class="flex min-h-screen bg-gray-100">
    @include('partials.sidebar')

    <main class="flex-1 p-8">
        <div class="max-w-3xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Confirmar Cancelación</h1>

        <div class="bg-white rounded-2xl shadow p-6">
            <p class="text-gray-700 mb-4">
            ¿Estás seguro de que deseas cancelar tu suscripción
            <span class="font-semibold text-indigo-600">{{ ucfirst($sub->plan) }}</span>
            que vence el <span class="font-semibold text-black">{{ $sub->fecha_expiracion->format('d/m/Y') }}</span>?
            </p>

            <div class="flex justify-center gap-4">
            <form action="{{ route('suscripciones.cancel', $sub->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button
                type="submit"
                class="px-6 py-2 bg-red-500 text-white rounded-lg shadow hover:bg-red-600 transition"
                >
                Sí, cancelar suscripción
                </button>
            </form>

            <a
                href="{{ route('suscripciones') }}"
                class="px-6 py-2 bg-gray-300 text-gray-800 rounded-lg shadow hover:bg-gray-400 transition"
            >
                No, volver atrás
            </a>
            </div>
        </div>
        </div>
    </main>
    </div>
</div>
@endsection
