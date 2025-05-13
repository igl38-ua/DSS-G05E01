@extends('layouts.app')

@section('content')
  {{-- Contenido principal: se expande para ocupar el alto libre --}}
  <div class="flex-grow px-20 py-20">
    {{-- Tabla a ancho completo, sin la restricción .container --}}
    <div class="mx-auto max-w-none overflow-x-auto">
      <table class="w-full border-separate bg-gray-300 shadow-lg">
        <thead>
          <tr class="time-grouping uppercase tracking-wider text-sm bg-gray-200">
            <th rowspan="2" class="py-4 px-4 border-r-2 border-gray-400">Clases</th>
            <th colspan="4" class="py-4 px-4 border-r border-gray-400">Mañana</th>
            <th colspan="2" class="py-4 px-4 border-r border-gray-400">Medio Día</th>
            <th colspan="4" class="py-4 px-4 border-r border-gray-400">Tarde</th>
            <th colspan="3" class="py-4 px-4">Noche</th>
          </tr>
          <tr class="hours text-xs text-gray-600 bg-gray-100">
            @foreach(['08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00'] as $hora)
              <th class="py-4 px-4 border-r border-gray-400">{{ $hora }}</th>
            @endforeach
          </tr>
        </thead>

        <tbody class="divide-y divide-gray-300">
        @foreach($clasesAgrupadas as $nombreClase => $clases)
          @php
            $colores = [
              'Boxeo'    => 'bg-red-500 text-white',
              'CrossFit' => 'bg-blue-500 text-white',
              'Zumba'    => 'bg-yellow-300 text-black',
              'Pilates'  => 'bg-purple-500 text-white',
            ];
          @endphp

          <tr>
            <td class="py-4 px-4 bg-gray-200 font-bold border-r-2 border-gray-400">
              <div class="py-3">{{ $nombreClase }}</div>
            </td>

            @foreach(['08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00'] as $hora)
              @php
                $claseEnHora = $clases->firstWhere('horario', $hora);
              @endphp

              <td class="py-4 px-4">
                @if($claseEnHora)
                  <div
                    class="block w-full h-6 {{ $colores[$nombreClase] ?? 'bg-gray-300' }} text-center rounded
                           {{ in_array($claseEnHora->id, $reservasUsuario) ? 'border-2 border-black' : '' }}">
                    {{ in_array($claseEnHora->id, $reservasUsuario) ? 'MI RESERVA' : '' }}
                  </div>
                @endif
              </td>
            @endforeach
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
