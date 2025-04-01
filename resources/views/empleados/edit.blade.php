<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Empleado</title>
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-100 text-gray-800">
<div class="max-w-3xl mx-auto my-10 px-4">
    <!-- Título -->
    <h1 class="text-2xl font-bold mb-6 flex items-center">
        <i class="fas fa-user-edit mr-2"></i> Editar Empleado
    </h1>
    
    <!-- Formulario -->
    <form action="{{ route('empleados.update', $empleado->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        
        <!-- Campo: Nombre -->
        <div class="mb-4">
            <label for="nombre" class="block font-medium text-gray-700 mb-1">Nombre</label>
            <input type="text" name="nombre" value="{{ old('nombre', $empleado->nombre) }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            @error('nombre') <small class="text-red-600">{{ $message }}</small> @enderror
        </div>
        
        <!-- Campo: Email -->
        <div class="mb-4">
            <label for="email" class="block font-medium text-gray-700 mb-1">Correo electrónico</label>
            <input type="email" name="email" value="{{ old('email', $empleado->email) }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            @error('email') <small class="text-red-600">{{ $message }}</small> @enderror
        </div>
        
        <!-- Campo: Dirección -->
        <div class="mb-4">
            <label for="direccion" class="block font-medium text-gray-700 mb-1">Dirección</label>
            <input type="text" name="direccion" value="{{ old('direccion', $empleado->direccion) }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            @error('direccion') <small class="text-red-600">{{ $message }}</small> @enderror
        </div>
        
        <!-- Campo: Horario de Trabajo -->
        <div class="mb-4">
            <label for="horarioTrabajo" class="block font-medium text-gray-700 mb-1">Horario de Trabajo</label>
            <input type="text" name="horarioTrabajo" value="{{ old('horarioTrabajo', $empleado->horarioTrabajo) }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            @error('horarioTrabajo') <small class="text-red-600">{{ $message }}</small> @enderror
        </div>
        
        <!-- Campo: Nómina -->
        <div class="mb-4">
            <label for="nomina" class="block font-medium text-gray-700 mb-1">Nómina</label>
            <input type="text" name="nomina" value="{{ old('nomina', $empleado->nomina) }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            @error('nomina') <small class="text-red-600">{{ $message }}</small> @enderror
        </div>
        
        <!-- Botones de acción -->
        <div class="flex items-center space-x-2">
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition flex items-center">
                <i class="fas fa-save mr-1"></i> Actualizar Empleado
            </button>
            <a href="{{ route('empleados.index') }}"
               class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition flex items-center">
                <i class="fas fa-times mr-1"></i> Cancelar
            </a>
        </div>
    </form>
</div>
</body>
</html>
