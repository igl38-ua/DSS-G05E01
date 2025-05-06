{{-- resources/views/partials/header.blade.php --}}
<header x-data="{ open: false }" class="bg-gradient-to-r from-indigo-500 to-purple-700 text-white p-6 md:p-8">
  <div class="container mx-auto px-4">
    <!-- Contenedor principal: t�tulo y navegaci�n -->
    <div class="flex items-center justify-between">
      <!-- T�tulo / Logo -->
      <a href="{{ route('inicio') }}" class="text-3xl font-bold uppercase tracking-wider">
        Smart Fit
      </a>

      <!-- Contenedor del men� y bot�n hamburguesa -->
      <div class="flex items-center">
        <!-- Men� de navegaci�n para pantallas MD y superiores -->
        <nav class="hidden md:flex items-center space-x-8">
          {{-- Secci�n: Inicio y Clases --}}
          <a href="{{ route('inicio') }}" class="hover:opacity-80 transition-opacity">
            <img src="{{ asset('images/Icono_Inicio.png') }}" alt="Inicio" class="h-8 w-8 object-contain">
          </a>
          <a href="{{ route('clases') }}" class="hover:opacity-80 transition-opacity">
            <img src="{{ asset('images/Icono_Horarios.png') }}" alt="Clases" class="h-8 w-8 object-contain">
          </a>

          {{-- Secci�n: Entrenadores --}}
          <a href="{{ route('entrenadores.index') }}" class="hover:opacity-80 transition-opacity">
            <img src="{{ asset('images/Icono_Entrenador.png') }}" alt="Entrenadores" class="h-8 w-8 object-contain">
          </a>

          {{-- Secci�n: Foro --}}
          <a href="{{ route('foro.index') }}" class="hover:opacity-80 transition-opacity">
            <img src="{{ asset('images/Icono_Foro.png') }}" alt="Foro" class="h-8 w-8 object-contain">
          </a>
          {{-- Secci�n: Rutina y Suscripciones --}}
          <a href="{{ route('playlists.show', ['playlistId' => 'PLz-l7oWFJS0JpFK3d3qSGbMSpcKjZgQI6']) }}" class="hover:opacity-80 transition-opacity">
            <img src="{{ asset('images/Icono_Clases.png') }}" alt="Rutina" class="h-8 w-8 object-contain">
          </a>
          <a href="{{ route('suscripciones') }}" class="hover:opacity-80 transition-opacity">
            <img src="{{ asset('images/Icono_Suscripciones.png') }}" alt="Suscripciones" class="h-8 w-8 object-contain">
          </a>

          {{-- Secci�n: Contacto y JAM --}}
          <a href="{{ route('contacto') }}" class="hover:opacity-80 transition-opacity">
            <img src="{{ asset('images/Icono_Contacto.png') }}" alt="Contacto" class="h-8 w-8 object-contain">
          </a>
          <a href="{{ route('jam.index') }}" class="hover:opacity-80 transition-opacity">
            <img src="{{ asset('images/Icono_Spotify.png') }}" alt="Jam" class="h-8 w-8 object-contain">
          </a>

          {{-- Secci�n: Perfil de usuario --}}
          <a href="{{ route('dashboard') }}" class="hover:opacity-80 transition-opacity">
            <img src="{{ asset('images/Icono_Perfil.png') }}" alt="Mi perfil" class="h-8 w-8 object-contain">
          </a>
        </nav>

        <!-- Bot�n hamburguesa para pantallas peque�as -->
        <button class="md:hidden ml-4 text-white focus:outline-none" @click="open = !open">
          <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
            <path d="M4 5h16M4 12h16M4 19h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- Men� de navegaci�n para m�viles (desplegable) -->
    <div x-cloak x-show="open" x-transition class="md:hidden mt-4">
      <nav class="flex flex-col items-start space-y-4 pl-4">
        {{-- Secci�n: Inicio y Clases --}}
        <a href="{{ route('inicio') }}" class="hover:opacity-80 transition-opacity">
          <img src="{{ asset('images/Icono_Inicio.png') }}" alt="Inicio" class="h-8 w-8 object-contain"> Inicio
        </a>
        <a href="{{ route('clases') }}" class="hover:opacity-80 transition-opacity">
          <img src="{{ asset('images/Icono_Horarios.png') }}" alt="Clases" class="h-8 w-8 object-contain"> Clases
        </a>

        {{-- Secci�n: Entrenadores --}}
        <a href="#" class="hover:opacity-80 transition-opacity">
          <img src="{{ asset('images/Icono_Entrenador.png') }}" alt="Entrenadores" class="h-8 w-8 object-contain"> Entrenadores
        </a>

        {{-- Secci�n: Foro --}}
          <a href="{{ route('foro.index') }}" class="hover:opacity-80 transition-opacity">
            <img src="{{ asset('images/Icono_Foro.png') }}" alt="Foro" class="h-8 w-8 object-contain"> Foro
          </a>

        {{-- Secci�n: Rutina y Suscripciones --}}
        <a href="{{ route('playlists.show', ['playlistId' => 'PLz-l7oWFJS0JpFK3d3qSGbMSpcKjZgQI6']) }}" class="hover:opacity-80 transition-opacity">
          <img src="{{ asset('images/Icono_Clases.png') }}" alt="Rutina" class="h-8 w-8 object-contain"> Rutina
        </a>
        <a href="{{ route('suscripciones') }}" class="hover:opacity-80 transition-opacity">
          <img src="{{ asset('images/Icono_Suscripciones.png') }}" alt="Suscripciones" class="h-8 w-8 object-contain"> Suscripciones
        </a>

        {{-- Secci�n: Contacto y JAM --}}
        <a href="{{ route('contacto') }}" class="hover:opacity-80 transition-opacity">
          <img src="{{ asset('images/Icono_Contacto.png') }}" alt="Contacto" class="h-8 w-8 object-contain"> Contacto
        </a>
        <a href="{{ route('jam.index') }}" class="hover:opacity-80 transition-opacity">
          <img src="{{ asset('images/Icono_Spotify.png') }}" alt="Jam" class="h-8 w-8 object-contain"> Jam
        </a>

        {{-- Secci�n: Perfil de usuario --}}
        <a href="{{ route('dashboard') }}" class="hover:opacity-80 transition-opacity">
          <img src="{{ asset('images/Icono_Perfil.png') }}" alt="Mi perfil" class="h-8 w-8 object-contain"> Mi perfil
        </a>
      </nav>
    </div>
  </div>
</header>
