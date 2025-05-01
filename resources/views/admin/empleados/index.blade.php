<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Empleados</title>
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-100 text-gray-800">
<div class="max-w-7xl mx-auto my-10 px-4">
<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <div class="px-6 py-4 border-b flex justify-between items-center">
        <h1 class="text-2xl font-bold mb-4 flex items-center">
            <i class="fas fa-users mr-2"></i> Listado de Empleados
        </h1>
    </div>

    <!-- Mensaje de éxito -->
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
        <a href="{{ route('admin.empleados.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition flex items-center">
            <i class="fas fa-user-plus mr-2"></i> Crear Usuario
        </a>
    </div>

    <!-- Tabla -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                @php
                    $newDirection = ($sort === 'nombre' && $direction === 'asc') ? 'desc' : 'asc';
                @endphp
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <a href="{{ route('admin.empleados.index', ['sort' => 'nombre', 'direction' => $newDirection]) }}" class="flex items-center group">
                        <i class="fas fa-user mr-1"></i> Nombre
                        @if($sort === 'nombre')
                            @if($direction === 'asc')
                                <i class="fas fa-arrow-up text-indigo-600 ml-1"></i>
                            @else
                                <i class="fas fa-arrow-down text-indigo-600 ml-1"></i>
                            @endif
                        @else
                            <i class="fas fa-arrows-alt-v text-gray-300 ml-1 group-hover:text-indigo-300"></i>
                        @endif
                    </a>
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dirección</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Horario de Trabajo</th>
                @php
                    $newDirectionNomina = ($sort === 'nomina' && $direction === 'asc') ? 'desc' : 'asc';
                @endphp
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <a href="{{ route('admin.empleados.index', ['sort' => 'nomina', 'direction' => $newDirectionNomina]) }}" class="flex items-center group">
                        <i class="fas fa-money-bill-wave mr-1"></i> Nómina
                        @if($sort === 'nomina')
                            @if($direction === 'asc')
                                <i class="fas fa-arrow-up text-indigo-600 ml-1"></i>
                            @else
                                <i class="fas fa-arrow-down text-indigo-600 ml-1"></i>
                            @endif
                        @else
                            <i class="fas fa-arrows-alt-v text-gray-300 ml-1 group-hover:text-indigo-300"></i>
                        @endif
                    </a>
                </th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($empleados as $empleado)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 whitespace-nowrap">{{ $empleado->nombre }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $empleado->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $empleado->direccion }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $empleado->horarioTrabajo }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $empleado->nomina }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-end space-x-2">
                            <a href="{{ route('admin.empleados.edit', $empleado->id) }}" class="text-indigo-600 hover:text-indigo-900 flex items-center">
                                <i class="fas fa-edit mr-1"></i> Editar
                            </a>
                            <form action="{{ route('admin.empleados.destroy', $empleado->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 flex items-center" onclick="return confirm('¿Seguro de eliminar este empleado?')">
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
            Mostrando <span class="font-medium">{{ $empleados->firstItem() }}</span> - 
            <span class="font-medium">{{ $empleados->lastItem() }}</span> de 
            <span class="font-medium">{{ $empleados->total() }}</span> resultados
        </div>
        <div>
        {{ $empleados->links('pagination::simple-tailwind') }}
        </div>
    </div>
</div>
</div>
</body>
</html>
