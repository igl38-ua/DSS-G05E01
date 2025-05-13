@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-gray-100">
  {{-- Sidebar --}}
  @include('partials.sidebar')

  <main class="flex-1 p-8">
    <div class="max-w-4xl mx-auto">
      <h1 class="text-3xl font-bold text-gray-800 mb-6">Suscripción Activa</h1>

      @php
        $sub = auth()->user()->suscripcionActual()->first();
      @endphp

      @if($sub)
        <div class="bg-gray-300 rounded-2xl shadow p-6">
          {{-- Cabecera del bloque --}}
          <h2 class="text-2xl font-semibold text-black mb-4">
            Plan: <span class="text-indigo-400">{{ ucfirst($sub->plan) }}</span>
          </h2>

          {{-- Datos en bloque interno --}}
          <div class="bg-slate-200 rounded-xl p-4 space-y-2">
            <div class="flex items-center gap-2">
              <span class="text-gray-500">Precio:</span>
              <span class="text-black font-semibold">{{ number_format($sub->precio, 2) }}€ / mes</span>
            </div>
            <div class="flex items-center gap-2">
              <span class="text-gray-500">Inicio:</span>
              <span class="text-black font-semibold">{{ optional($sub->fecha_inicio)->format('d/m/Y') }}</span>
            </div>
            <div class="flex items-center gap-2">
              <span class="text-gray-500">Expira:</span>
              <span class="text-black font-semibold">{{ optional($sub->fecha_expiracion)->format('d/m/Y') }}</span>
            </div>
          </div>

          {{-- CTA --}}
          <div class="mt-6 text-center">
            <a href="{{ route('suscripciones') }}"
               class="inline-block px-4 py-2 bg-gradient-to-r from-indigo-500 to-purple-700 text-white rounded-lg shadow hover:from-indigo-600 hover:to-purple-800">
              Ver suscripciones
            </a>
          </div>
        </div>
      @else
        <div class="bg-gray-300 rounded-2xl shadow p-6 text-center">
          <p class="text-gray-300 mb-4">Actualmente no tienes una suscripción activa.</p>
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
