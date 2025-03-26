@extends('layouts.app')

@section('title', 'Editar Clase')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Card Container con sombra y bordes redondeados -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
        <!-- Encabezado con gradiente -->
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 px-6 py-4">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-bold text-white flex items-center">
                    <i class="fas fa-edit mr-3"></i> Editar Clase
                </h2>
                <span class="bg-white/20 px-3 py-1 rounded-full text-sm text-white">
                    ID: {{ $clase->id }}
                </span>
            </div>
        </div>

        <!-- Cuerpo del formulario -->
        <div class="p-6">
            <form action="{{ route('classes.update', $clase) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Grid responsive -->
                <div class="grid md:grid-cols-2 gap-6">

                    <!-- Campo: Nombre -->
                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-700">
                            <i class="fas fa-tag mr-2 text-indigo-500"></i>Nombre de la clase
                        </label>
                        <input type="text" name="nombre" value="{{ old('nombre', $clase->nombre) }}"
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200"
                               placeholder="Ej: Zumba Avanzado" required>
                        @error('nombre')
                        <p class="mt-1 text-sm text-red-600 animate-pulse">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo: Capacidad -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">
                            <i class="fas fa-users mr-2 text-indigo-500"></i>Capacidad máxima
                        </label>
                        <div class="relative">
                            <input type="number" name="capacidad_max" min="1" value="{{ old('capacidad_max', $clase->capacidad_max) }}"
                                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 pr-12"
                                   required>
                            <span class="absolute right-3 top-3.5 text-gray-400 text-sm">personas</span>
                        </div>
                        @error('capacidad_max')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo: Horario -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">
                            <i class="far fa-clock mr-2 text-indigo-500"></i>Horario
                        </label>
                        <input type="time" name="horario" value="{{ old('horario', $clase->horario) }}"
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500"
                               required>
                        @error('horario')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo: JAM -->
                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-700">
                            <i class="fas fa-music mr-2 text-indigo-500"></i>Instructor JAM
                        </label>
                        <input type="text" name="jam" value="{{ old('jam', $clase->jam) }}"
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500"
                               placeholder="Opcional">
                        @error('jam')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- Sección de acciones -->
                <div class="mt-8 pt-5 border-t border-gray-200 flex justify-between">
                    <div>
                        <p class="text-sm text-gray-500">
                            <i class="fas fa-info-circle mr-1"></i> Última actualización: 
                            {{ $clase->updated_at->diffForHumans() }}
                        </p>
                    </div>
                    <div class="flex space-x-3">
                        <a href="{{ route('classes.index') }}" 
                           class="btn-cancel">
                            <i class="fas fa-times mr-2"></i> Cancelar
                        </a>
                        <button type="submit" 
                                class="btn-save">
                            <i class="fas fa-save mr-2"></i> Guardar Cambios
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection