@extends('layouts.app')

@section('title', 'Crear Nueva Clase')

@section('content')
<div class="max-w-md mx-auto">
    <div class="card">
        <div class="card-header">
            <h2 class="text-xl font-bold flex items-center">
                <i class="fas fa-plus-circle mr-3"></i> Nueva Clase
            </h2>
        </div>
        <div class="p-6">
            <form action="{{ route('classes.store') }}" method="POST">
                @csrf
                
                <div class="space-y-4">
                    <!-- Campo Nombre -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-tag mr-2 text-indigo-500"></i> Nombre de la clase
                        </label>
                        <input type="text" name="nombre" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                               placeholder="Ej: Yoga Matutino">
                    </div>

                    <!-- Campo Capacidad -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-users mr-2 text-indigo-500"></i> Capacidad máxima
                        </label>
                        <div class="relative">
                            <input type="number" name="capacidad_max" min="1" required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 pr-12"
                                   placeholder="20">
                            <span class="absolute right-3 top-2 text-gray-400">personas</span>
                        </div>
                    </div>

                    <!-- Campo Horario -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="far fa-clock mr-2 text-indigo-500"></i> Horario
                        </label>
                        <input type="time" name="horario" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <!-- Campo Instructor -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-user-tie mr-2 text-indigo-500"></i> Instructor (opcional)
                        </label>
                        <input type="text" name="jam"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                               placeholder="Nombre del instructor">
                    </div>
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <a href="{{ route('classes.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        <i class="fas fa-times mr-2"></i> Cancelar
                    </a>
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-save mr-2"></i> Guardar Clase
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection