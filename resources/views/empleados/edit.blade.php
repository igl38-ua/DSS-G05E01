<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Empleado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Editar Empleado</h1>
    <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $empleado->nombre) }}">
            @error('nombre') <small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $empleado->email) }}">
            @error('email') <small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $empleado->direccion) }}">
            @error('direccion') <small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
            <label for="horarioTrabajo">Horario de Trabajo</label>
            <input type="text" name="horarioTrabajo" class="form-control" value="{{ old('horarioTrabajo', $empleado->horarioTrabajo) }}">
            @error('horarioTrabajo') <small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
            <label for="nomina">Nómina</label>
            <input type="text" name="nomina" class="form-control" value="{{ old('nomina', $empleado->nomina) }}">
            @error('nomina') <small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Empleado</button>
        <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
