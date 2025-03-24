{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,
        %3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none'%3E
        %3Crect x='3' y='9' width='3' height='6' fill='%23FF5733'/%3E
        %3Crect x='6' y='8' width='2' height='8' fill='%23D32F2F'/%3E
        %3Crect x='8' y='10' width='8' height='2' fill='white'/%3E
        %3Crect x='16' y='8' width='2' height='8' fill='%23D32F2F'/%3E
        %3Crect x='18' y='9' width='3' height='6' fill='%23FF5733'/%3E
        %3Ccircle cx='5' cy='9' r='1' fill='white' opacity='0.6'/%3E
        %3Ccircle cx='19' cy='9' r='1' fill='white' opacity='0.6'/%3E
        %3C/svg%3E">

    <title>Gimnasio</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Puedes incluir Bootstrap o tu CSS personalizado -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    @include('partials.header')
    
    <main>
        @yield('content')
    </main>
    
    @include('partials.footer')
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
