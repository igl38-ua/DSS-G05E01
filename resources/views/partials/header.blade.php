{{-- resources/views/partials/header.blade.php --}}
<header class="bg-gradient-to-r from-orange-800 via-red-800 to-pink-900 text-white py-8">
    <div class="container mx-auto px-4">
        <!-- Barra única con todo en la misma línea, centrado -->
        <nav class="flex items-center justify-center space-x-8">
            <!-- Título / Logo -->
            <a href="{{ route('inicio') }}" class="text-3xl font-bold uppercase tracking-wider">
                Mi Gimnasio
            </a>

            <!-- Enlaces del menú -->
            <a href="{{ route('inicio') }}" class="text-2xl uppercase hover:text-gray-300 transition-colors">
                Inicio
            </a>
            <a href="{{ route('clases') }}" class="text-2xl uppercase hover:text-gray-300 transition-colors">
                Clases
            </a>

            <a href="#" class="text-2xl uppercase hover:text-gray-300 transition-colors">
                Entrenadores
            </a>
            <a href="#" class="text-2xl uppercase hover:text-gray-300 transition-colors">
                Contacto
            </a>
            <a href="#" class="text-2xl uppercase hover:text-gray-300 transition-colors">
                Mi perfil
            </a>
            <!-- Agrega más enlaces si lo necesitas -->
        </nav>
    </div>
</header>
