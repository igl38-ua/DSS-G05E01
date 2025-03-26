<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-100 text-gray-800">

<div class="max-w-3xl mx-auto my-10 px-4">
    <!-- Título -->
    <h1 class="text-2xl font-bold mb-6 flex items-center">
        <i class="fas fa-user-edit mr-2"></i> Editar Usuario
    </h1>

    <!-- Formulario -->
    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <!-- Campo: Nombre -->
        <div class="mb-4">
            <label for="nombre" class="block font-medium text-gray-700 mb-1">Nombre</label>
            <input type="text" name="nombre" value="{{ old('nombre', $usuario->nombre) }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md 
                          focus:outline-none focus:ring-2 focus:ring-indigo-500 
                          focus:border-indigo-500"
            >
            @error('nombre')
            <small class="text-red-600">{{ $message }}</small>
            @enderror
        </div>

        <!-- Campo: Email -->
        <div class="mb-4">
            <label for="email" class="block font-medium text-gray-700 mb-1">Correo electrónico</label>
            <input type="email" name="email" value="{{ old('email', $usuario->email) }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md 
                          focus:outline-none focus:ring-2 focus:ring-indigo-500 
                          focus:border-indigo-500"
            >
            @error('email')
            <small class="text-red-600">{{ $message }}</small>
            @enderror
        </div>

        <!-- Campo: Teléfono -->
        <div class="mb-4">
            <label for="telefono" class="block font-medium text-gray-700 mb-1">Teléfono</label>
            <input type="text" name="telefono" value="{{ old('telefono', $usuario->telefono) }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md 
                          focus:outline-none focus:ring-2 focus:ring-indigo-500 
                          focus:border-indigo-500"
            >
            @error('telefono')
            <small class="text-red-600">{{ $message }}</small>
            @enderror
        </div>

        <!-- Campo: Contraseña -->
        <div class="mb-4">
            <label for="contrasena" class="block font-medium text-gray-700 mb-1">Contraseña</label>
            <input type="password" name="contrasena" 
                   value="{{ old('contrasena', $usuario->contrasena) }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md 
                          focus:outline-none focus:ring-2 focus:ring-indigo-500 
                          focus:border-indigo-500"
            >
            @error('contrasena')
            <small class="text-red-600">{{ $message }}</small>
            @enderror
        </div>

        <!-- Campo: Fecha de Inscripción -->
        <div class="mb-4">
            <label for="fecha_inscripcion" class="block font-medium text-gray-700 mb-1">Fecha de Inscripción</label>
            <input type="date" name="fecha_inscripcion" 
                   value="{{ old('fecha_inscripcion', $usuario->fecha_inscripcion) }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md 
                          focus:outline-none focus:ring-2 focus:ring-indigo-500 
                          focus:border-indigo-500"
            >
            @error('fecha_inscripcion')
            <small class="text-red-600">{{ $message }}</small>
            @enderror
        </div>

        <!-- Botones de acción -->
        <div class="flex items-center space-x-2">
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition flex items-center">
                <i class="fas fa-save mr-1"></i> Actualizar Usuario
            </button>
            <a href="{{ route('usuarios.index') }}"
               class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition flex items-center">
                <i class="fas fa-times mr-1"></i> Cancelar
            </a>
        </div>
    </form>
</div>

</body>
</html>
