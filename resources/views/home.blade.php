<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Gestión de Gimnasios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Panel de Administración - Gestión de Gimnasios</h1>
        <hr>
        <div class="list-group">
            <a href="{{ route('usuarios.index') }}" class="list-group-item list-group-item-action">
                Gestión de Usuarios
            </a>
            <a href="{{ route('clases.index') }}" class="list-group-item list-group-item-action">
                Gestión de Clases
            </a>
            <a href="{{ route('empleados.index') }}" class="list-group-item list-group-item-action">
                Gestión de Empleados
            </a>
        </div>
    </div>
</body>
</html>
