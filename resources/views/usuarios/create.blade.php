<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Crear Usuario</h1>
    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
            @error('nombre') <small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            @error('email') <small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}">
            @error('telefono') <small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
            <label for="contrasena">Contraseña</label>
            <input type="password" name="contrasena" class="form-control">
            @error('contrasena') <small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
            <label for="fecha_inscripcion">Fecha de Inscripción</label>
            <input type="date" name="fecha_inscripcion" class="form-control" value="{{ old('fecha_inscripcion') }}">
            @error('fecha_inscripcion') <small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Crear Usuario</button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
