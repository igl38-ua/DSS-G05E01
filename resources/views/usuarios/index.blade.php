<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Listado de Usuarios</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- para volver a home -->
        <a href="{{ route('home') }}" class="btn btn-secondary">Volver al Inicio</a>
        <!-- para crear un usuario nuevo -->
        <a href="{{ route('usuarios.create') }}" class="btn btn-primary">Crear Usuario</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                @php
                    // Para la columna Nombre
                    $newDirectionNombre = ($sort === 'nombre' && $direction === 'asc') ? 'desc' : 'asc';
                @endphp
                <th>
                    <a href="{{ route('usuarios.index', ['sort' => 'nombre', 'direction' => $newDirectionNombre]) }}">
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
                
                @php
                    // Para la columna Fecha de Inscripción
                    $newDirectionFecha = ($sort === 'fecha_inscripcion' && $direction === 'asc') ? 'desc' : 'asc';
                @endphp
                <th>
                    <a href="{{ route('usuarios.index', ['sort' => 'fecha_inscripcion', 'direction' => $newDirectionFecha]) }}">
                        Fecha de Inscripción
                        @if($sort === 'fecha_inscripcion')
                            @if($direction === 'asc')
                                <small>&uarr;</small>
                            @else
                                <small>&darr;</small>
                            @endif
                        @endif
                    </a>
                </th>
                
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ \Carbon\Carbon::parse($usuario->fecha_inscripcion)->format('d-m-Y') }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->telefono }}</td>
                    <td>
                        <a href="{{ route('usuarios.edit', $usuario->id) }}"
                           class="btn btn-sm btn-warning">
                            Editar
                        </a>
                        <form action="{{ route('usuarios.destroy', $usuario->id) }}"
                              method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Seguro de eliminar este usuario?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- menú de paginación -->
    <hr>
    <div class="d-flex justify-content-center mt-3">
        {{ $usuarios->links() }}
    </div>
</div>
</body>
</html>
