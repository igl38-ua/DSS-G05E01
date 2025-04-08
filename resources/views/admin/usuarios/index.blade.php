<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-100 text-gray-800">
<div class="max-w-7xl mx-auto my-10 px-4">
<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <div class="px-6 py-4 border-b flex justify-between items-center">
        <h1 class="text-2xl font-bold mb-4 flex items-center">
            <i class="fas fa-users mr-2"></i> Listado de Usuarios
        </h1>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="px-6 py-4 border-b flex justify-between items-center">
        <!-- Para volver a home -->
        <a href="{{ route('admin.dashboard') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition flex items-center">
            <i class="fas fa-home mr-2"></i> Volver al Inicio
        </a>
        <!-- Para crear un usuario nuevo -->
        <a href="{{ route('admin.usuarios.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition flex items-center">
            <i class="fas fa-user-plus mr-2"></i> Crear Usuario
        </a>
    </div>

    <div class="px-6 py-4 overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                @php
                    $newDirectionNombre = ($sort === 'nombre' && $direction === 'asc') ? 'desc' : 'asc';
                @endphp
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                    <a href="{{ route('admin.usuarios.index', ['sort' => 'nombre', 'direction' => $newDirectionNombre]) }}" class="flex items-center group">
                        <i class="fas fa-user mr-1"></i> Nombre
                        @if($sort === 'nombre')
                            <i class="fas fa-arrow-{{ $direction === 'asc' ? 'up' : 'down' }} text-indigo-600 ml-1"></i>
                        @else
                            <i class="fas fa-arrows-alt-v text-gray-300 ml-1 group-hover:text-indigo-300"></i>
                        @endif
                    </a>
                </th>

                @php
                    $newDirectionFecha = ($sort === 'fecha_inscripcion' && $direction === 'asc') ? 'desc' : 'asc';
                @endphp
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                    <a href="{{ route('admin.usuarios.index', ['sort' => 'fecha_inscripcion', 'direction' => $newDirectionFecha]) }}" class="flex items-center group">
                        <i class="fas fa-calendar-alt mr-1"></i> Fecha de Inscripción
                        @if($sort === 'fecha_inscripcion')
                            <i class="fas fa-arrow-{{ $direction === 'asc' ? 'up' : 'down' }} text-indigo-600 ml-1"></i>
                        @else
                            <i class="fas fa-arrows-alt-v text-gray-300 ml-1 group-hover:text-indigo-300"></i>
                        @endif
                    </a>
                </th>

                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <i class="fas fa-envelope mr-1"></i> Email
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <i class="fas fa-phone mr-1"></i> Teléfono
                </th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <i class="fas fa-cog mr-1"></i> Acciones
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($usuarios as $usuario)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">
                        {{ $usuario->nombre }}
                    </td>
                    <td class="px-6 py-4">
                        {{ \Carbon\Carbon::parse($usuario->fecha_inscripcion)->format('d-m-Y') }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $usuario->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $usuario->telefono }}
                    </td>
                    <td class="px-6 py-4 text-right text-sm font-medium">
                        <div class="flex justify-end space-x-2">
                            <a href="{{ route('admin.usuarios.edit', $usuario->id) }}" class="text-indigo-600 hover:text-indigo-900 flex items-center">
                                <i class="fas fa-edit mr-1"></i> Editar
                            </a>
                            <form action="{{ route('admin.usuarios.destroy', $usuario->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 flex items-center" onclick="return confirm('¿Seguro de eliminar este usuario?')">
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

    <!-- Paginación -->
    <div class="px-6 py-4 bg-gray-50 border-t flex items-center justify-between">
        <!-- Texto a la izquierda -->
        <div class="text-sm text-gray-500">
            Mostrando <span class="font-medium">{{ $usuarios->firstItem() }}</span> - 
            <span class="font-medium">{{ $usuarios->lastItem() }}</span> de 
            <span class="font-medium">{{ $usuarios->total() }}</span> resultados
        </div>
        <div>
            {{ $usuarios->links('pagination::simple-tailwind') }}
        </div>
    </div>

    
</div>



</div>
</div>
</body>
</html>
