<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Empleado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Crear Empleado</h1>
    <form action="{{ route('empleados.store') }}" method="POST">
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
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" class="form-control" value="{{ old('direccion') }}">
            @error('direccion') <small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
            <label for="horarioTrabajo">Horario de Trabajo</label>
            <input type="text" name="horarioTrabajo" class="form-control" value="{{ old('horarioTrabajo') }}">
            @error('horarioTrabajo') <small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
            <label for="nomina">Nómina</label>
            <input type="text" name="nomina" class="form-control" value="{{ old('nomina') }}">
            @error('nomina') <small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Crear Empleado</button>
        <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
