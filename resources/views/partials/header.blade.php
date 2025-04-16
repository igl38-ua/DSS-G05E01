{{-- resources/views/partials/header.blade.php --}}
<header x-data="{ open: false }" class="bg-gradient-to-r from-indigo-500 to-purple-700 text-white p-6 md:p-8">
  <div class="container mx-auto px-4">
    <!-- Contenedor principal: título y navegación -->
    <div class="flex items-center justify-between">
      <!-- Título / Logo -->
      <a href="{{ route('inicio') }}" class="text-3xl font-bold uppercase tracking-wider">
        Smart Fit
      </a>

      <!-- Contenedor del menú y botón hamburguesa -->
      <div class="flex items-center">
        <!-- Menú de navegación para pantallas MD y superiores -->
        <nav class="hidden md:flex items-center space-x-8">
          <a href="{{ route('inicio') }}" class="text-2xl uppercase hover:text-gray-300 transition-colors">Inicio</a>
          <a href="{{ route('clases') }}" class="text-2xl uppercase hover:text-gray-300 transition-colors">Clases</a>
          <a href="#" class="text-2xl uppercase hover:text-gray-300 transition-colors">Entrenadores</a>
          <a href="{{ route('suscripciones') }}" class="text-2xl uppercase hover:text-gray-300 transition-colors">Suscripciones</a>
          <a href="{{ route('contacto') }}" class="text-2xl uppercase hover:text-gray-300 transition-colors">Contacto</a>
          <a href="{{ route('jam.index') }}" class="text-2xl uppercase hover:text-gray-300 transition-colors">JAM</a>
          <a href="{{ route('perfil.index') }}" class="text-2xl uppercase hover:text-gray-300 transition-colors">Mi perfil</a>
        </nav>

        <!-- Botón hamburguesa para pantallas pequeñas (se muestra solo en MD inferior) -->
        <button class="md:hidden ml-4 text-white focus:outline-none" @click="open = !open">
          <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
            <path d="M4 5h16M4 12h16M4 19h16"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- Menú de navegación para móviles (desplegable) -->
    <!-- x-cloak evita el parpadeo del menú antes de que Alpine se inicie -->
    <div x-cloak x-show="open" x-transition class="md:hidden mt-4">
      <nav class="flex flex-col items-start space-y-4 pl-4">
        <a href="{{ route('inicio') }}" class="text-2xl uppercase hover:text-gray-300 transition-colors">Inicio</a>
        <a href="{{ route('clases') }}" class="text-2xl uppercase hover:text-gray-300 transition-colors">Clases</a>
        <a href="#" class="text-2xl uppercase hover:text-gray-300 transition-colors">Entrenadores</a>
        <a href="{{ route('suscripciones') }}" class="text-2xl uppercase hover:text-gray-300 transition-colors">Suscripciones</a>
        <a href="{{ route('contacto') }}" class="text-2xl uppercase hover:text-gray-300 transition-colors">Contacto</a>
        <a href="{{ route('jam.index') }}" class="text-2xl uppercase hover:text-gray-300 transition-colors">JAM</a>
        <a href="{{ route('perfil.index') }}" class="text-2xl uppercase hover:text-gray-300 transition-colors">Mi perfil</a>
      </nav>
    </div>
  </div>
</header>
