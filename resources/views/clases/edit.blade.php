<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Clase</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-100 text-gray-800">
<div class="max-w-md mx-auto my-10 px-4">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="px-6 py-4 border-b flex justify-between items-center">
            <h2 class="text-xl font-bold flex items-center">
                <i class="fas fa-edit mr-3 text-indigo-600"></i> Editar Clase
            </h2>
            <span class="bg-gray-100 px-2 py-1 rounded text-sm text-gray-600">ID: {{ $clase->id }}</span>
        </div>
        <div class="p-6">
            <form action="{{ route('classes.update', $clase) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <!-- Nombre -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-tag mr-2 text-indigo-500"></i> Nombre de la clase
                        </label>
                        <input type="text" name="nombre" value="{{ old('nombre', $clase->nombre) }}" required
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <!-- Capacidad -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-users mr-2 text-indigo-500"></i> Capacidad máxima
                        </label>
                        <input type="number" name="capacidad_max" min="1" value="{{ old('capacidad_max', $clase->capacidad_max) }}" required
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <!-- Horario -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="far fa-clock mr-2 text-indigo-500"></i> Horario
                        </label>
                        <input type="time" name="horario" value="{{ old('horario', $clase->horario) }}" required
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <!-- Instructor -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-user-tie mr-2 text-indigo-500"></i> Instructor (opcional)
                        </label>
                        <input type="text" name="jam" value="{{ old('jam', $clase->jam) }}"
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <a href="{{ route('classes.index') }}"
                       class="px-4 py-2 border border-gray-300 rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50 flex items-center">
                        <i class="fas fa-times mr-2"></i> Cancelar
                    </a>
                    <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm font-medium hover:bg-indigo-700 flex items-center">
                        <i class="fas fa-save mr-2"></i> Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
