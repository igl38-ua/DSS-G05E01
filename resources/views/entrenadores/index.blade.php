@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-center mb-8">
        <i class="fas fa-list-alt mr-2"></i> Listado Completo de Clases
    </h1>

    @if($totalClases === 0)
        <div class="bg-blue-50 border border-blue-200 text-blue-800 px-4 py-3 rounded text-center">
            <i class="fas fa-info-circle mr-2"></i>
            No hay clases registradas en el sistema.
        </div>
    @else
        <!-- Resumen estadístico -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-white p-4 rounded-lg shadow border-l-4 border-blue-500">
                <p class="text-sm text-gray-500">Total Clases</p>
                <p class="text-2xl font-bold">{{ $totalClases }}</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow border-l-4 border-yellow-500">
                <p class="text-sm text-gray-500">Sin Instructor</p>
                <p class="text-2xl font-bold">{{ $clasesAgrupadas['sin_instructor']->count() }}</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow border-l-4 border-red-500">
                <p class="text-sm text-gray-500">Clases Completas</p>
                <p class="text-2xl font-bold">{{ $clasesAgrupadas['completas']->count() }}</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow border-l-4 border-gray-500">
                <p class="text-sm text-gray-500">Clases Pasadas</p>
                <p class="text-2xl font-bold">{{ $clasesAgrupadas['pasadas']->count() }}</p>
            </div>
        </div>

        <!-- Listado completo de clases -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Instructor</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha/Hora</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cupos</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($clases as $clase)
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4 border">{{ $clase->nombre }}</td>
                        <td class="py-2 px-4 border">{{ $clase->descripcion ?? 'Sin descripción' }}</td>
                        <td class="py-2 px-4 border">
                            {{ $clase->fecha ? \Carbon\Carbon::parse($clase->fecha)->format('d/m/Y') : 'Sin fecha' }}
                            <br>
                            {{ $clase->horario ?? 'Sin horario' }}
                        </td>
                        <td class="py-2 px-4 border font-semibold">
                            {{ $clase->instructor ?? 'Sin asignar' }}
                        </td>
                        <td class="py-2 px-4 border">
                            @if(isset($clase->capacidad_max))
                                {{ $clase->reservas_count }}/{{ $clase->capacidad_max }}
                            @else
                                Ilimitado
                            @endif
                        </td>
                        <td class="py-2 px-4 border">
                            @auth
                                @php
                                    $yaReservada = Auth::user()->reservas->contains('ID_Clase', $clase->id);
                                @endphp

                                @if(!$yaReservada)
                                    <form action="{{ route('reserva.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="ID_Clase" value="{{ $clase->id }}">
                                        
                                        <button type="submit" 
                                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700
                                            @if($clase->capacidad_max && $clase->reservas_count >= $clase->capacidad_max)
                                                opacity-50 cursor-not-allowed bg-gray-400
                                            @endif"
                                            @if($clase->capacidad_max && $clase->reservas_count >= $clase->capacidad_max)
                                                disabled
                                            @endif>
                                            
                                            <i class="fas fa-bookmark mr-1"></i>
                                            {{ $clase->capacidad_max && $clase->reservas_count >= $clase->capacidad_max ? 'Llena' : 'Reservar' }}
                                        </button>
                                    </form>
                                @else
                                    <span class="px-4 py-2 bg-green-100 text-green-800 rounded">
                                        <i class="fas fa-check mr-1"></i> Reservada
                                    </span>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
                                    <i class="fas fa-sign-in-alt mr-1"></i> Inicia sesión para reservar
                                </a>
                            @endauth
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Resumen por grupos -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Clases sin instructor -->
            @if($clasesAgrupadas['sin_instructor']->isNotEmpty())
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6 bg-yellow-50 border-b border-yellow-200">
                    <h3 class="text-lg leading-6 font-medium text-yellow-800">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        Clases sin instructor asignado ({{ $clasesAgrupadas['sin_instructor']->count() }})
                    </h3>
                </div>
                <div class="px-4 py-2 divide-y divide-yellow-100">
                    @foreach($clasesAgrupadas['sin_instructor'] as $clase)
                    <div class="py-3">
                        <h4 class="font-medium">{{ $clase->nombre }}</h4>
                        <p class="text-sm text-gray-600">{{ $clase->fecha ? \Carbon\Carbon::parse($clase->fecha)->format('d/m/Y') : 'Sin fecha' }} a las {{ $clase->horario ?? '--:--' }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Clases completas -->
            @if($clasesAgrupadas['completas']->isNotEmpty())
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6 bg-red-50 border-b border-red-200">
                    <h3 class="text-lg leading-6 font-medium text-red-800">
                        <i class="fas fa-times-circle mr-2"></i>
                        Clases completas ({{ $clasesAgrupadas['completas']->count() }})
                    </h3>
                </div>
                <div class="px-4 py-2 divide-y divide-red-100">
                    @foreach($clasesAgrupadas['completas'] as $clase)
                    <div class="py-3">
                        <h4 class="font-medium">{{ $clase->nombre }}</h4>
                        <p class="text-sm text-gray-600">
                            Con {{ $clase->instructor ?? 'Sin instructor' }} | 
                            {{ $clase->fecha ? \Carbon\Carbon::parse($clase->fecha)->format('d/m/Y') : 'Sin fecha' }}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    @endif
</div>
@endsection