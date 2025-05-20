@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-gray-100">
  @include('partials.sidebar')

  <main class="flex-1 p-8">
    <div class="max-w-4xl mx-auto">
      <h1 class="text-3xl font-bold text-gray-800 mb-6">Suscripción Activa</h1>

      @php
        // Nota: aquí devolvemos el modelo, no el query builder
        $sub = auth()->user()->suscripcionActual;
      @endphp

      @if($sub)
        <div class="bg-gray-300 rounded-2xl shadow p-6">
          <h2 class="text-2xl font-semibold text-black mb-4">
            Plan: <span class="text-indigo-400">{{ ucfirst($sub->plan) }}</span>
          </h2>

          <div class="bg-slate-200 rounded-xl p-4 space-y-2">
            <div class="flex items-center gap-2">
              <span class="text-gray-500">Precio:</span>
              <span class="text-black font-semibold">{{ number_format($sub->precio, 2) }}€</span>
            </div>
            <div class="flex items-center gap-2">
              <span class="text-gray-500">Inicio:</span>
              <span class="text-black font-semibold">{{ $sub->fecha_inicio->format('d/m/Y') }}</span>
            </div>
            <div class="flex items-center gap-2">
              <span class="text-gray-500">Expira:</span>
              <span class="text-black font-semibold">{{ $sub->fecha_expiracion->format('d/m/Y') }}</span>
            </div>
          </div>

          <div class="mt-6 text-center space-y-4">
            <a href="{{ route('suscripciones') }}"
               class="inline-block px-4 py-2 bg-gradient-to-r from-indigo-500 to-purple-700 text-white rounded-lg shadow hover:from-indigo-600 hover:to-purple-800">
              Ver suscripciones
            </a>

            <!-- Botón rojo de cancelar -->
            <form action="{{ route('suscripciones.cancel', $sub->id) }}" method="POST" class="inline">
              @csrf
              @method('DELETE')
              <button
                type="submit"
                class="px-4 py-2 bg-red-500 text-white rounded-lg shadow hover:bg-red-600 transition"
              >
                Cancelar suscripción
              </button>
            </form>
          </div>
        </div>
      @else
        <div class="bg-gray-300 rounded-2xl shadow p-6 text-center">
          <p class="text-gray-900 mb-4">Actualmente no tienes una suscripción activa.</p>
          <a href="{{ route('suscripciones') }}"
             class="inline-block px-4 py-2 bg-gradient-to-r from-indigo-500 to-purple-700 text-white rounded-lg shadow hover:from-indigo-600 hover:to-purple-800">
            Ver planes disponibles
          </a>
        </div>
      @endif
    </div>
  </main>
</div>
@endsection
