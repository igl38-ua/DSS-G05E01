<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Gestión de Clases</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .btn-primary {
            @apply bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition-all duration-200 shadow hover:shadow-md flex items-center;
        }
        .btn-danger {
            @apply bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm flex items-center;
        }
        .btn-edit {
            @apply bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm flex items-center;
        }
        .card {
            @apply bg-white rounded-xl shadow-md overflow-hidden border border-gray-100;
        }
        .card-header {
            @apply bg-gradient-to-r from-indigo-600 to-purple-700 px-6 py-4 text-white;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    @include('partials.header')
    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>
</body>
</html>