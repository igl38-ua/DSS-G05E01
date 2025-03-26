@extends('layouts.app')

@section('title', 'Gestión de Clases')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="card">
        <div class="card-header flex justify-between items-center">
            <h1 class="text-2xl font-bold flex items-center">
                <i class="fas fa-calendar-week mr-3"></i> Listado de Clases
            </h1>
            <a href="{{ route('classes.create') }}" class="btn-primary">
                <i class="fas fa-plus-circle mr-2"></i> Nueva Clase
            </a>
        </div>

        <!-- Reemplaza tu sección de búsqueda con esto: -->
<form action="{{ route('classes.index') }}" method="GET" class="mb-8 bg-gradient-to-r from-purple-50 to-blue-50 rounded-2xl p-6 shadow-inner">
    <input type="hidden" name="sort" value="{{ $sortField }}">
    <input type="hidden" name="direction" value="{{ $sortDirection }}">
    
    <div class="max-w-4xl mx-auto">
        <h3 class="text-lg font-medium text-purple-800 mb-4 flex items-center">
            <i class="fas fa-search-plus mr-2"></i> Búsqueda Avanzada
        </h3>
        
        <div class="grid md:grid-cols-2 gap-4">
            <!-- Búsqueda por Nombre -->
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-dumbbell text-purple-500"></i>
                </div>
                <input 
                    type="text" 
                    name="search" 
                    value="{{ $search }}"
                    class="pl-10 w-full rounded-lg border-0 ring-1 ring-purple-200 focus:ring-2 focus:ring-purple-500 shadow-sm"
                    placeholder="Buscar por clase...">
            </div>
            
            <!-- Búsqueda por JAM -->
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-music text-blue-500"></i>
                </div>
                <input 
                    type="text" 
                    name="search_jam" 
                    value="{{ $searchJam }}"
                    class="pl-10 w-full rounded-lg border-0 ring-1 ring-blue-200 focus:ring-2 focus:ring-blue-500 shadow-sm"
                    placeholder="Buscar por instructor JAM...">
            </div>
        </div>
        
        <div class="mt-4 flex justify-between items-center">
            <button 
                type="submit" 
                class="bg-gradient-to-r from-purple-600 to-blue-600 text-white px-5 py-2 rounded-full shadow-lg hover:shadow-xl transition-all flex items-center">
                <i class="fas fa-search mr-2"></i> Buscar
            </button>
            
            @if($search || $searchJam)
                <a 
                    href="{{ route('classes.index', ['sort' => $sortField, 'direction' => $sortDirection]) }}" 
                    class="text-sm text-gray-500 hover:text-purple-700 flex items-center">
                    <i class="fas fa-times mr-1"></i> Limpiar filtros
                </a>
            @endif
        </div>
    </div>
</form>

        <!-- Filtros activos -->
        @if($search || $searchJam)
        <div class="mb-4 flex flex-wrap gap-2">
            @if($search)
            <span class="inline-flex items-center bg-purple-100 text-purple-800 text-sm px-3 py-1 rounded-full">
                Clase: {{ $search }}
                <a href="{{ route('classes.index', ['search_jam' => $searchJam, 'sort' => $sortField, 'direction' => $sortDirection]) }}" 
                   class="ml-1 text-purple-500 hover:text-purple-700">
                    <i class="fas fa-times"></i>
                </a>
            </span>
            @endif
            
            @if($searchJam)
            <span class="inline-flex items-center bg-blue-100 text-blue-800 text-sm px-3 py-1 rounded-full">
                JAM: {{ $searchJam }}
                <a href="{{ route('classes.index', ['search' => $search, 'sort' => $sortField, 'direction' => $sortDirection]) }}" 
                   class="ml-1 text-blue-500 hover:text-blue-700">
                    <i class="fas fa-times"></i>
                </a>
            </span>
            @endif
        </div>
        @endif

        <div class="px-6 py-4 bg-white">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                            <a href="{{ route('classes.index', [
                                'sort' => 'nombre',
                                'direction' => ($sortField === 'nombre' && $sortDirection === 'asc') ? 'desc' : 'asc'
                            ]) }}" class="flex items-center group">
                                <i class="fas fa-tag mr-1"></i> Nombre
                                @if($sortField === 'nombre')
                                    <span class="ml-1">
                                        <i class="fas fa-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }} text-indigo-600"></i>
                                    </span>
                                @else
                                    <span class="ml-1 text-gray-300 group-hover:text-indigo-300">
                                        <i class="fas fa-arrows-alt-v"></i>
                                    </span>
                                @endif
                            </a>
                        </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <i class="far fa-clock mr-1"></i> Horario
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                                <a href="{{ route('classes.index', [
                                    'sort' => 'capacidad_max',
                                    'direction' => ($sortField === 'capacidad_max' && $sortDirection === 'asc') ? 'desc' : 'asc'
                                ]) }}" class="flex items-center group">
                                    <i class="fas fa-users mr-1"></i> Capacidad
                                    @if($sortField === 'capacidad_max')
                                        <span class="ml-1">
                                            <i class="fas fa-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }} text-indigo-600"></i>
                                        </span>
                                    @else
                                        <span class="ml-1 text-gray-300 group-hover:text-indigo-300">
                                            <i class="fas fa-arrows-alt-v"></i>
                                        </span>
                                    @endif
                                </a>
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <i class="fas fa-cog mr-1"></i> Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($clases as $clase)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-dumbbell text-indigo-600"></i>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $clase->nombre }}</div>
                                        <div class="text-sm text-gray-500">{{ $clase->jam ?? 'Sin instructor' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $clase->horario }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-24 mr-2">
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div class="bg-blue-500 h-2 rounded-full" style="width: {{ min(100, ($clase->capacidad_max/50)*100) }}%"></div>
                                        </div>
                                    </div>
                                    <span class="text-sm text-gray-600">{{ $clase->capacidad_max }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-2">
                                    <a href="{{ route('classes.edit', $clase) }}" class="btn-edit">
                                        <i class="fas fa-edit mr-1"></i> Editar
                                    </a>
                                    <form action="{{ route('classes.destroy', $clase) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-danger" onclick="return confirm('¿Eliminar esta clase?')">
                                            <i class="fas fa-trash-alt mr-1"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Paginación -->
        <div class="px-6 py-4 bg-gray-50 border-t flex items-center justify-between">
            <div class="text-sm text-gray-500">
                Mostrando <span class="font-medium">{{ $clases->firstItem() }}</span> a 
                <span class="font-medium">{{ $clases->lastItem() }}</span> de 
                <span class="font-medium">{{ $clases->total() }}</span> resultados
            </div>
            <div>
                {{ $clases->links() }}
            </div>
        </div>
    </div>
</div>
@endsection