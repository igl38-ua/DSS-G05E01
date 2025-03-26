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

        <div class="px-6 py-4 bg-white">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <i class="fas fa-tag mr-1"></i> Nombre
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <i class="far fa-clock mr-1"></i> Horario
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <i class="fas fa-users mr-1"></i> Capacidad
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