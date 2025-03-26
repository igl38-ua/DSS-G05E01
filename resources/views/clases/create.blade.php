@extends('layouts.app')

@section('title', 'Crear Nueva Clase')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Card Container -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <!-- Card Header -->
        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 px-6 py-4">
            <h2 class="text-2xl font-bold text-white flex items-center">
                <i class="fas fa-plus-circle mr-3"></i> Nueva Clase
            </h2>
        </div>

        <!-- Card Body -->
        <div class="p-6">
            <form action="{{ route('classes.store') }}" method="POST">
                @csrf

                <!-- Grid de 2 columnas para pantallas medianas/grandes -->
                <div class="grid md:grid-cols-2 gap-6">

                    <!-- Campo: Nombre -->
                    <div class="col-span-2">
                        <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-tag mr-2 text-blue-500"></i>Nombre de la Clase
                        </label>
                        <input type="text" id="nombre" name="nombre" 
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                               placeholder="Ej: Yoga Matutino" required>
                        @error('nombre')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo: Capacidad -->
                    <div>
                        <label for="capacidad_max" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-users mr-2 text-blue-500"></i>Capacidad Máxima
                        </label>
                        <div class="relative">
                            <input type="number" id="capacidad_max" name="capacidad_max" min="1" max="50"
                                   class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="Ej: 20" required>
                            <span class="absolute right-3 top-2 text-gray-400">personas</span>
                        </div>
                        @error('capacidad_max')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo: Horario -->
                    <div>
                        <label for="horario" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="far fa-clock mr-2 text-blue-500"></i>Horario
                        </label>
                        <input type="time" id="horario" name="horario"
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                               required>
                        @error('horario')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo: JAM (Opcional) -->
                    <div class="col-span-2">
                        <label for="jam" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-music mr-2 text-blue-500"></i>Instructor JAM (Opcional)
                        </label>
                        <input type="text" id="jam" name="jam"
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                               placeholder="Ej: DJ Carlos">
                        @error('jam')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- Botones de acción -->
                <div class="mt-8 flex justify-end space-x-4">
                    <a href="{{ route('classes.index') }}" class="btn-secondary">
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