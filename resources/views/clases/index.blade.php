@extends('layouts.app')

@section('title', 'Gestión de Clases')

@section('content')
<!-- Cabecera Mejorada -->
<div class="bg-gradient-to-r from-blue-600 to-indigo-800 shadow-lg rounded-t-xl">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <a href="{{ route('inicio') }}" class="flex items-center text-white hover:text-blue-200 transition-colors">
                    <i class="fas fa-home text-2xl mr-2"></i>
                    <span class="text-xl font-bold">Inicio</span>
                </a>
                <h1 class="text-2xl font-bold text-white ml-4">
                    <i class="fas fa-calendar-alt mr-2"></i> Gestión de Clases
                </h1>
            </div>
            <a href="{{ route('classes.create') }}" class="btn-create">
                <i class="fas fa-plus-circle mr-2"></i> Nueva Clase
            </a>
        </div>
    </div>
</div>

<!-- Contenido Principal -->
<div class="bg-white shadow-lg rounded-b-xl overflow-hidden">
    <!-- Barra de Búsqueda -->
    <div class="px-6 py-4 bg-gray-50 border-b">
        <form action="{{ route('classes.index') }}" method="GET">
            <div class="flex items-center">
                <input type="text" name="search" placeholder="Buscar clases..." 
                       class="w-full md:w-1/3 px-4 py-2 rounded-l-lg border focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                       value="{{ request('search') }}">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-r-lg transition-colors">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </div>

    <!-- Tabla de Clases -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                        <i class="fas fa-tag mr-1"></i> Nombre
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                        <i class="far fa-clock mr-1"></i> Horario
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                        <i class="fas fa-users mr-1"></i> Capacidad
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                        <i class="fas fa-music mr-1"></i> JAM
                    </th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-700 uppercase tracking-wider">
                        <i class="fas fa-cogs mr-1"></i> Acciones
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($clases as $clase)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-dumbbell text-blue-600"></i>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{ $clase->nombre }}</div>
                                <div class="text-sm text-gray-500">ID: {{ $clase->id }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                            {{ $clase->horario }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="w-24 mr-2">
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-green-500 h-2 rounded-full" 
                                         style="width: {{ min(100, ($clase->capacidad_max/50)*100) }}%"></div>
                                </div>
                            </div>
                            <span class="text-sm text-gray-600">{{ $clase->capacidad_max }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $clase->jam ?? 'N/A' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-end space-x-2">
                            <a href="{{ route('classes.edit', $clase) }}" class="btn-edit">
                                <i class="fas fa-edit mr-1"></i> Editar
                            </a>
                            <form action="{{ route('classes.destroy', $clase) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('¿Eliminar esta clase?')">
                                    <i class="fas fa-trash-alt mr-1"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                        <i class="fas fa-info-circle mr-2"></i> No se encontraron clases
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación y Footer -->
    <div class="px-6 py-4 bg-gray-50 border-t flex items-center justify-between">
        <div class="text-sm text-gray-500">
            Mostrando <span class="font-medium">{{ $clases->firstItem() }}</span> a 
            <span class="font-medium">{{ $clases->lastItem() }}</span> de 
            <span class="font-medium">{{ $clases->total() }}</span> clases
        </div>
        <div class="flex space-x-2">
            {{ $clases->links() }}
        </div>
    </div>
</div>
@endsection