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
        <div class="bg-gray-900 rounded-2xl shadow p-6">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-white">Plan: <span class="text-indigo-400">{{ ucfirst($sub->plan) }}</span></h2>
          </div>
          <ul class="space-y-2">
            <li class="flex justify-between">
              <span class="text-gray-400">Precio:</span>
              <span class="text-white font-semibold">{{ number_format($sub->precio, 2) }}€ / mes</span>
            </li>
            <li class="flex justify-between">
              <span class="text-gray-400">Inicio:</span>
              <span class="text-white font-semibold">{{ optional($sub->fecha_inicio)->format('d/m/Y') }}</span>
            </li>
            <li class="flex justify-between">
              <span class="text-gray-400">Expira:</span>
              <span class="text-white font-semibold">{{ optional($sub->fecha_expiracion)->format('d/m/Y') }}</span>
            </li>
          </ul>

          <div class="mt-6 text-center">
            <a href="{{ route('suscripciones') }}" class="btn-primary inline-block">
              Ver historial de suscripciones
            </a>
          </div>
        </div>
      @else
        <div class="bg-gray-900 rounded-2xl shadow p-6 text-center">
          <p class="text-gray-300 mb-4">Actualmente no tienes una suscripción activa.</p>
          <a href="{{ route('suscripciones') }}" class="btn-primary inline-block">
            Ver planes disponibles
          </a>
        </div>
      @endif
    </div>
  </main>
</div>
@endsection
