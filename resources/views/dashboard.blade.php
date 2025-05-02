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
          <a href="{{ route('suscripciones') }}" class="btn-primary">Actualiza tu suscripción</a>
          @if(auth()->user()->avatar_url)
            <img src="{{ auth()->user()->avatar_url }}" alt="Avatar" class="w-10 h-10 rounded-full border-2 border-gray-300">
          @else
            <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center border-2 border-gray-300">
              <i class="fas fa-user text-gray-600"></i>
            </div>
          @endif
        </div>
      </div>

      {{-- Content Grid --}}
      <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">

        <!-- {{-- Progresión asistencia --}}
        <div class="bg-gray-900 rounded-2xl shadow p-6">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-white">Progresión asistencia</h2>
            <a href="{{ route('progreso') }}" class="text-sm text-gray-400 hover:text-white">Ver más</a>
          </div>

          {{-- Raw JSON data for JS --}}
          <script type="application/json" id="attendance-data-json">
            {!! json_encode($attendanceData) !!}
          </script>

          {{-- fixed-height container --}}
          <div id="calendar-heatmap" class="pt-2 h-40">hola</div>
        </div> -->

        {{-- Suscripción actual --}}
        <div class="bg-gray-900 rounded-2xl shadow p-6">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-white">Suscripción</h2>
            <a href="{{ route('mi-suscripcion') }}" class="text-sm text-gray-400 hover:text-white">Ver historial</a>
          </div>
          <ul class="space-y-2">
            @foreach(auth()->user()->suscripciones()->get() as $sub)
              <li class="flex justify-between bg-gray-800 rounded-lg p-3">
                <span class="text-gray-300">
                  {{ optional($sub->fecha_inicio)->format('j M') ?? '—' }} — {{ ucfirst($sub->plan) }}
                </span>
                <span class="font-semibold text-white">
                  -{{ number_format($sub->precio, 2) }}€
                </span>
              </li>
            @endforeach
          </ul>
        </div>

        {{-- Próximas clases --}}
        <div class="bg-gray-900 rounded-2xl shadow p-6">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-white">Próximas clases</h2>
            <a href="{{ route('clases') }}" class="text-sm text-gray-400 hover:text-white">Ver todas</a>
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
              <tbody class="text-gray-300">
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
        <div class="bg-gray-900 rounded-2xl shadow p-6 xl:col-span-2">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-white">Clases recientes</h2>
            <a href="{{ route('mis-clases') }}" class="text-sm text-gray-400 hover:text-white">Ver historial completo</a>
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
              <tbody class="text-gray-300">
                @forelse($recentClasses as $res)
                  <tr class="border-t border-gray-700">
                    <td class="py-2">{{ $res->clase->nombre }}</td>
                    <td class="py-2">{{ $res->fecha->fecha_formateada }}</td>
                    <td class="py-2">{{ $res->fecha->hora_inicio_formateada }}</td>
                    <td class="py-2">{{ $res->clase->instructor }}</td>
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
        <div class="bg-gray-900 rounded-2xl shadow p-6">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-white">Objetivo del mes</h2>
            <a href="{{ route('metas') }}" class="text-sm text-gray-400 hover:text-white">Editar</a>
          </div>
          <p class="text-gray-400 mb-4">
            Has completado <strong class="text-white">{{ $completedClasses }}</strong> de 
            <strong class="text-white">{{ $monthlyGoal }}</strong> clases este mes.
          </p>
          <div class="w-full bg-gray-700 h-2 rounded-full overflow-hidden mb-2">
            <div class="h-full bg-purple-500" style="width: {{ $progressPercentage }}%"></div>
          </div>
          <p class="text-gray-400">{{ $progressPercentage }}% cumplido</p>
        </div>

      </div>
    </div>
  </main>
</div>
@endsection

@push('scripts')
  @vite('resources/js/dashboard.js')
@endpush