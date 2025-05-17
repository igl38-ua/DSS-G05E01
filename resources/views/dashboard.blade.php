@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-gray-100">
  {{-- Sidebar --}}
  @include('partials.sidebar')

  <main class="flex-1 p-8">
    <div class="max-w-6xl mx-auto">
      {{-- Header bar --}}
      <div class="flex justify-between items-center mb-8">
        <div>
          <h1 class="text-3xl font-bold">¡Hola, {{ auth()->user()->nombre }}!</h1>
          <p class="text-gray-600">Este es tu panel personal.</p>
        </div>
        <div class="flex items-center space-x-4">
          {{-- Botón principal con degradado --}}
          <a href="{{ route('suscripciones') }}"
             class="inline-block px-4 py-2 bg-gradient-to-r from-indigo-500 to-purple-700 text-white rounded-lg shadow hover:from-indigo-600 hover:to-purple-800">
            Actualiza tu suscripción
          </a>

          @if(auth()->user()->avatar_url)
            <img src="{{ auth()->user()->avatar_url }}" alt="Avatar"
                 class="w-10 h-10 rounded-full border-2 border-gray-300">
          @else
            <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center border-2 border-gray-300">
              <i class="fas fa-user text-gray-600"></i>
            </div>
          @endif
        </div>
      </div>

      {{-- Content Grid --}}
      <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">

        {{-- Suscripción actual --}}
        <div class="bg-gray-300 rounded-2xl shadow p-6">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-black">Suscripción</h2>
            <a href="{{ route('mi-suscripcion') }}"
               class="inline-block px-2 py-1 text-xs bg-gradient-to-r from-indigo-500 to-purple-700 text-white rounded hover:from-indigo-600 hover:to-purple-800">
              Ver suscripción
            </a>
          </div>
          <ul class="space-y-2">
            @foreach(auth()->user()->suscripciones()->get() as $sub)
              <li class="flex justify-between bg-gray-400 rounded-lg p-3">
                <span class="text-black">
                  {{ optional($sub->fecha_inicio)->format('j M') ?? '—' }} — {{ ucfirst($sub->plan) }}
                </span>
                <span class="font-semibold text-black">
                  -{{ number_format($sub->precio, 2) }}€
                </span>
              </li>
            @endforeach
          </ul>
        </div>

        {{-- Próximas clases --}}
        <div class="bg-gray-300 rounded-2xl shadow p-6">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-black">Próximas clases</h2>
            <a href="{{ route('clases') }}"
               class="inline-block px-2 py-1 text-xs bg-gradient-to-r from-indigo-500 to-purple-700 text-white rounded hover:from-indigo-600 hover:to-purple-800">
              Ver todas
            </a>
          </div>
          <div class="overflow-x-auto">
            <table class="w-full text-left">
              <thead>
                <tr class="text-gray-500 uppercase text-sm">
                  <th class="pb-2">Clase</th>
                  <th class="pb-2">Fecha</th>
                  <th class="pb-2">Horario</th>
                  <th class="pb-2">Entrenador</th>
                </tr>
              </thead>
              <tbody class="text-gray-500">
              @forelse($upcomingClasses as $reserva)
                  <tr class="border-t border-gray-700">
                    <td class="py-2">{{ $reserva->clase->nombre }}</td>
                    <td class="py-2">{{ $reserva->fecha->fecha_formateada }}</td>
                    <td class="py-2">{{ $reserva->fecha->hora_inicio_formateada }}</td>
                    <td class="py-2">{{ $reserva->clase->instructor }}</td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="4" class="py-4 text-center text-gray-500">No hay próximas clases.</td>
                  </tr>
                @endforelse
                </tbody>
            </table>
          </div>
        </div>

        {{-- Clases recientes --}}
        <div class="bg-gray-300 rounded-2xl shadow p-6 xl:col-span-2">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-black">Clases recientes</h2>
            <a href="{{ route('mis-clases') }}"
               class="inline-block px-2 py-1 text-xs bg-gradient-to-r from-indigo-500 to-purple-700 text-white rounded hover:from-indigo-600 hover:to-purple-800">
              Ver historial completo
            </a>
          </div>
          <div class="overflow-x-auto">
            <table class="w-full text-left">
              <thead>
                <tr class="text-gray-500 uppercase text-sm">
                  <th class="pb-2">Clase</th>
                  <th class="pb-2">Fecha</th>
                  <th class="pb-2">Horario</th>
                  <th class="pb-2">Entrenador</th>
                </tr>
              </thead>
              <tbody class="text-gray-500">
              @forelse($recentClasses as $res)
                  <tr class="border-t border-gray-400">
                      <td class="py-2">{{ optional($res->clase)->nombre ?? 'Clase no disponible' }}</td>
                      <td class="py-2">{{ optional($res->fecha)->fecha_formateada ?? 'No definida' }}</td>
                      <td class="py-2">{{ optional($res->fecha)->hora_inicio_formateada ?? '--:--' }}</td>
                      <td class="py-2">{{ optional($res->clase)->instructor ?? 'Sin asignar' }}</td>
                  </tr>
              @empty
                  <tr>
                      <td colspan="4" class="py-4 text-center text-gray-500">No tienes clases recientes.</td>
                  </tr>
              @endforelse
              </tbody>
            </table>
          </div>
        </div>

        {{-- Objetivo del mes --}}
        <div class="bg-gray-300 rounded-2xl shadow p-6">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-black">Objetivo del mes</h2>
            <a class="inline-block px-2 py-1 text-xs bg-gradient-to-r from-indigo-500 to-purple-700 text-white rounded hover:from-indigo-600 hover:to-purple-800">
              Editar
            </a>
          </div>
          <p class="text-gray-500 mb-4">
            Has completado <strong class="text-black">{{ $completedClasses }}</strong> de 
            <strong class="text-black">{{ $monthlyGoal }}</strong> clases este mes.
          </p>
          <div class="w-full bg-gray-200 h-2 rounded-full overflow-hidden mb-2">
            <div class="h-full bg-purple-500" style="width: {{ $progressPercentage }}%"></div>
          </div>
          <p class="text-gray-500">{{ $progressPercentage }}% cumplido</p>
        </div>

      </div>
    </div>
  </main>
</div>
@endsection
