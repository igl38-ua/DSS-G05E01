<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Empleados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Listado de Empleados</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Botones superiores -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('home') }}" class="btn btn-secondary">Volver al Inicio</a>
        <a href="{{ route('empleados.create') }}" class="btn btn-primary">Crear Empleado</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                @php
                    $newDirection = ($sort === 'nombre' && $direction === 'asc') ? 'desc' : 'asc';
                @endphp

                <th>
                    <a href="{{ route('empleados.index', ['sort' => 'nombre', 'direction' => $newDirection]) }}">
                        Nombre
                        @if($sort === 'nombre')
                            @if($direction === 'asc')
                                <small>&uarr;</small>
                            @else
                                <small>&darr;</small>
                            @endif
                        @endif
                    </a>
                </th>
                
                <th>Email</th>
                <th>Dirección</th>
                <th>Horario de Trabajo</th>
                <!-- <th>Nómina</th> -->
                @php
                    $newDirectionNomina = ($sort === 'nomina' && $direction === 'asc') ? 'desc' : 'asc';
                @endphp

                <th>
                    <a href="{{ route('empleados.index', ['sort' => 'nomina', 'direction' => $newDirectionNomina]) }}">
                        Nómina
                        @if($sort === 'nomina')
                            @if($direction === 'asc')
                                <small>&uarr;</small>
                            @else
                                <small>&darr;</small>
                            @endif
                        @endif
                    </a>
                </th>

                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->nombre }}</td>
                    <td>{{ $empleado->email }}</td>
                    <td>{{ $empleado->direccion }}</td>
                    <td>{{ $empleado->horarioTrabajo }}</td>
                    <td>{{ $empleado->nomina }}</td>
                    <td>
                        <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro de eliminar este empleado?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Menú de paginación -->
    <hr>
    <div class="d-flex justify-content-center mt-3">
        {{ $empleados->links() }}
    </div>
</div>
</body>
</html>
