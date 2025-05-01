<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado Dinámico de Entidades</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script>
        // Función para redirigir al cambiar la entidad
        function changeEntity(selectObj) {
            var entity = selectObj.value;
            window.location.href = "{{ route('admin.dynamic.index') }}?entity=" + entity;
        }
    </script>
</head>
<body class="bg-gray-100 text-gray-800">
<div class="max-w-7xl mx-auto my-10 px-4">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Encabezado -->
        <div class="px-6 py-4 border-b flex justify-between items-center">
            <h1 class="text-2xl font-bold flex items-center">
                <i class="fas fa-database mr-2"></i> Listado Dinámico de Entidades
            </h1>
        </div>

        @if(session('success'))
            <div class="px-6 py-4">
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded-lg">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <!-- Botón para volver al inicio y casilla de selección de entidad -->
        <div class="px-6 py-4 border-b flex justify-between items-center">
            <!-- Botón Volver al Inicio -->
            <a href="{{ route('admin.dashboard') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition flex items-center">
                <i class="fas fa-home mr-2"></i> Volver al Inicio
            </a>
            <!-- Dropdown de selección de entidad -->
            <div>
                <select onchange="changeEntity(this)" class="border border-gray-300 rounded-lg px-4 py-2">
                    @foreach($entities as $entityName => $modelClass)
                        <option value="{{ $entityName }}" {{ $selectedEntity == $entityName ? 'selected' : '' }}>
                            {{ $entityName }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Listado de registros -->
        <div class="px-6 py-4 overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    @foreach($columns as $column)
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ ucfirst($column) }}
                        </th>
                    @endforeach
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <i class="fas fa-cog"></i> Acciones
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($records as $record)
                    <tr class="hover:bg-gray-50 transition">
                        @foreach($columns as $column)
                            <td class="px-6 py-4">
                                {{ $record->$column }}
                            </td>
                        @endforeach
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <form action="{{ route('admin.dynamic.destroy', ['entity' => $selectedEntity, 'id' => $record->id]) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 flex items-center" onclick="return confirm('¿Seguro de eliminar este registro?')">
                                    <i class="fas fa-trash-alt mr-1"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="px-6 py-4 bg-gray-50 border-t flex items-center justify-between">
            <div class="text-sm text-gray-500">
                Mostrando <span class="font-medium">{{ $records->firstItem() }}</span> - 
                <span class="font-medium">{{ $records->lastItem() }}</span> de 
                <span class="font-medium">{{ $records->total() }}</span> resultados
            </div>
            <div>
                {{ $records->links('pagination::simple-tailwind') }}
            </div>
        </div>
    </div>
</div>
</body>
</html>
