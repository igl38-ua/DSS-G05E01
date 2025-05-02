@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-gray-100">
  {{-- Sidebar --}}
  @include('partials.sidebar')

  <main class="flex-1 p-8">
    <div class="max-w-6xl mx-auto">
      <h1 class="text-3xl font-bold mb-6">Historial de Clases</h1>

      <div class="bg-gray-900 rounded-2xl shadow p-6 overflow-x-auto">
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
            @forelse($reservas as $reserva)
              <tr class="border-t border-gray-700">
                <td class="py-2">{{ $reserva->clase->nombre }}</td>
                <td class="py-2">{{ optional($reserva->fecha)->hora_fin_formateada}}</td>
                <td class="py-2">
                  {{ optional($reserva->fecha)->hora_inicio }} –
                  {{ optional($reserva->fecha)->hora_fin }}
                </td>
                <td class="py-2">{{ $reserva->clase->instructor }}</td>
              </tr>
            @empty
              <tr>
                <td colspan="4" class="py-4 text-center text-gray-400">
                  No has reservado ninguna clase aún.
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </main>
</div>
@endsection
