<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Editar Usuario</h1>
    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $usuario->nombre) }}">
            @error('nombre') <small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $usuario->email) }}">
            @error('email') <small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $usuario->telefono) }}">
            @error('telefono') <small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
            <label for="contrasena">Contraseña</label>
            <input type="password" name="contrasena" class="form-control" value="{{ old('contrasena', $usuario->contrasena) }}">
            @error('contrasena') <small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
            <label for="fecha_inscripcion">Fecha de Inscripción</label>
            <input type="date" name="fecha_inscripcion" class="form-control" value="{{ old('fecha_inscripcion', $usuario->fecha_inscripcion) }}">
            @error('fecha_inscripcion') <small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
