@extends('layouts.app')

@section('title', 'Editar Clase')

@section('content')
<div class="max-w-md mx-auto">
    <div class="card">
        <div class="card-header flex justify-between items-center">
            <h2 class="text-xl font-bold flex items-center">
                <i class="fas fa-edit mr-3"></i> Editar Clase
            </h2>
            <span class="bg-white/20 px-2 py-1 rounded text-sm">ID: {{ $clase->id }}</span>
        </div>
        <div class="p-6">
            <form action="{{ route('classes.update', $clase) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="space-y-4">
                    <!-- Campo Nombre -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-tag mr-2 text-indigo-500"></i> Nombre de la clase
                        </label>
                        <input type="text" name="nombre" value="{{ old('nombre', $clase->nombre) }}" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <!-- Campo Capacidad -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-users mr-2 text-indigo-500"></i> Capacidad máxima
                        </label>
                        <input type="number" name="capacidad_max" min="1" value="{{ old('capacidad_max', $clase->capacidad_max) }}" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <!-- Campo Horario -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="far fa-clock mr-2 text-indigo-500"></i> Horario
                        </label>
                        <input type="time" name="horario" value="{{ old('horario', $clase->horario) }}" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <!-- Campo Instructor -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-user-tie mr-2 text-indigo-500"></i> Instructor (opcional)
                        </label>
                        <input type="text" name="jam" value="{{ old('jam', $clase->jam) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <a href="{{ route('classes.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        <i class="fas fa-times mr-2"></i> Cancelar
                    </a>
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-save mr-2"></i> Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection