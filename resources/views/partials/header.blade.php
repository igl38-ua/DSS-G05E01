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
          {{-- Sección: Inicio --}}
          <a href="{{ route('inicio') }}" class="hover:opacity-80 transition-opacity flex items-center">
            <!-- Icono Inicio -->
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9.75L12 3l9 6.75v10.5a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 20.25V9.75z" />
            </svg>
            <span class="ml-2">Inicio</span>
          </a>
          
          {{-- Sección: Clases --}}
          <a href="{{ route('clases') }}" class="hover:opacity-80 transition-opacity flex items-center">
            <!-- Icono Clases (horario) -->
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <!-- Contorno del calendario -->
              <rect x="3" y="4" width="18" height="18" rx="2" ry="2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <!-- Línea de cabecera -->
              <line x1="3" y1="10" x2="21" y2="10" stroke-width="2" stroke-linecap="round" />
              <!-- Columnas de horario -->
              <line x1="8" y1="4" x2="8" y2="22" stroke-width="2" stroke-linecap="round" />
              <line x1="16" y1="4" x2="16" y2="22" stroke-width="2" stroke-linecap="round" />
            </svg>
            <span class="ml-2">Clases</span>
          </a>

          {{-- Sección: Entrenadores --}}
          <a href="{{ route('entrenadores.index') }}" class="hover:opacity-80 transition-opacity flex items-center">
            <!-- Icono Entrenadores (grupo) -->
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM23 17c0 1.657-1.343 3-3 3H4c-1.657 0-3-1.343-3-3" />
            </svg>
            <span class="ml-2">Entrenadores</span>
          </a>

          {{-- Sección: Foro --}}
          <a href="{{ route('foro.index') }}" class="hover:opacity-80 transition-opacity flex items-center">
            <!-- Icono Foro (chat bubbles) -->
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <!-- Burbuja de chat principal -->
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 12c0 4.418-4.03 8-9 8-1.78 0-3.428-.454-4.876-1.247L3 21l1.247-4.628A8.932 8.932 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
              <!-- Tres puntos de conversación -->
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 10h.01M12 10h.01M16 10h.01" />
            </svg>
            <span class="ml-2">Foro</span>
          </a>

          {{-- Sección: Rutina --}}
          <a href="{{ route('playlists.show', ['playlistId' => 'PLz-l7oWFJS0JpFK3d3qSGbMSpcKjZgQI6']) }}" class="hover:opacity-80 transition-opacity flex items-center">
            <!-- Icono Rutina (checklist) -->
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <!-- Clipbord outline -->
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 2h6a2 2 0 012 2v2H7V4a2 2 0 012-2z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 6h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V8a2 2 0 012-2z" />
              <!-- Check items -->
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 17l2 2 4-4" />
            </svg>
            <span class="ml-2">Rutina</span>
          </a>

          {{-- Sección: Suscripciones --}}
          <a href="{{ route('suscripciones') }}" class="hover:opacity-80 transition-opacity flex items-center">
            <!-- Icono Suscripciones (tarjeta de pago) -->
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <!-- Contorno de tarjeta -->
              <rect x="2" y="7" width="20" height="12" rx="2" ry="2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <!-- Banda magnética -->
              <line x1="2" y1="11" x2="22" y2="11" stroke-width="2" stroke-linecap="round" />
              <!-- Chip de la tarjeta -->
              <rect x="6" y="13" width="4" height="3" rx="1" ry="1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span class="ml-2">Suscripciones</span>
          </a>

          {{-- Sección: Contacto --}}
          <a href="{{ route('contacto') }}" class="hover:opacity-80 transition-opacity flex items-center">
            <!-- Icono Contacto -->
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            <span class="ml-2">Contacto</span>
          </a>

          {{-- Sección: JAM --}}
          <a href="{{ route('jam.index') }}" class="hover:opacity-80 transition-opacity flex items-center">
            <!-- Icono JAM (Spotify) -->
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
              <path d="M 25 1.9902344 C 12.266865 1.9902344 1.9902344 12.266865 1.9902344 25 C 1.9902344 37.733135 12.266865 48.009766 25 48.009766 C 37.733135 48.009766 48.009766 37.733135 48.009766 25 C 48.009766 12.266865 37.733135 1.9902344 25 1.9902344 z M 25 4.0097656 C 36.650865 4.0097656 45.990234 13.349135 45.990234 25 C 45.990234 36.650865 36.650865 45.990234 25 45.990234 C 13.349135 45.990234 4.0097656 36.650865 4.0097656 25 C 4.0097656 13.349135 13.349135 4.0097656 25 4.0097656 z M 21.933594 14 C 16.000841 14 11.536373 15.027452 11.318359 15.078125 L 11.316406 15.078125 L 11.316406 15.080078 C 9.7155259 15.453865 8.7059511 17.079339 9.078125 18.679688 C 9.450288 20.281477 11.075526 21.288538 12.675781 20.921875 L 12.683594 20.921875 L 12.689453 20.919922 C 12.575843 20.947632 12.739283 20.908042 12.859375 20.882812 C 12.979472 20.857582 13.156783 20.822622 13.386719 20.779297 C 13.846591 20.692637 14.514202 20.576349 15.345703 20.460938 C 17.008724 20.230114 19.325722 20 21.933594 20 L 21.996094 20 C 26.308988 20.0059 32.506391 20.667785 37.480469 23.587891 L 37.482422 23.587891 L 37.482422 23.589844 C 37.954848 23.865283 38.481566 24 38.998047 24 C 40.027098 24 41.03278 23.462606 41.587891 22.517578 C 42.4204 21.099781 41.937951 19.245598 40.519531 18.412109 C 34.27637 14.746763 27.008921 14.007143 22.003906 14 L 21.933594 14 z M 21.933594 16 L 22.003906 16 C 26.808831 16.007 33.751684 16.758455 39.505859 20.136719 C 39.99344 20.42323 40.148772 21.019657 39.863281 21.505859 C 39.672394 21.830832 39.340995 22 38.998047 22 C 38.827923 22 38.658397 21.95814 38.494141 21.863281 L 38.490234 21.861328 C 33.0131 18.647428 26.504103 18.006131 21.998047 18 L 21.933594 18 C 19.208465 18 16.806263 18.239792 15.072266 18.480469 C 14.205267 18.600807 13.504003 18.72047 13.015625 18.8125 C 12.771436 18.85852 12.58045 18.8978 12.447266 18.925781 C 12.322091 18.952081 12.331069 18.948276 12.230469 18.972656 C 11.674724 19.099993 11.153228 18.776774 11.025391 18.226562 C 10.897698 17.677484 11.221452 17.156242 11.769531 17.027344 C 11.921515 16.992022 16.232346 16 21.933594 16 z M 21.992188 22.001953 C 19.485831 22.022933 17.321981 22.257131 15.742188 22.498047 C 14.162394 22.738963 13.265055 22.956785 12.976562 23.039062 C 11.545298 23.4449 10.697078 24.961798 11.103516 26.394531 C 11.511255 27.828702 13.027844 28.672719 14.458984 28.265625 L 14.464844 28.263672 L 14.46875 28.263672 C 14.49469 28.257572 14.53521 28.248108 14.587891 28.236328 C 14.69326 28.212768 14.848723 28.180835 15.048828 28.140625 C 15.449038 28.060205 16.026057 27.951569 16.740234 27.84375 C 18.168588 27.628113 20.142467 27.410079 22.322266 27.390625 C 26.185509 27.356565 30.567753 27.924285 34.84375 30.587891 C 35.289626 30.867749 35.792755 31.001953 36.28125 31.001953 C 37.187002 31.001953 38.077741 30.54265 38.589844 29.722656 C 39.378024 28.458742 38.985326 26.765566 37.720703 25.978516 C 32.336064 22.623808 26.560664 21.964096 21.992188 22.001953 z M 22.009766 24 C 26.371289 23.96386 31.724703 24.598489 36.664062 27.675781 C 37.00944 27.890731 37.108398 28.317977 36.892578 28.664062 C 36.752681 28.88807 36.521498 29.001953 36.28125 29.001953 C 36.149745 29.001953 36.024374 28.968673 35.90625 28.894531 L 35.904297 28.892578 C 31.213033 25.969431 26.380741 25.35469 22.304688 25.390625 C 20.002485 25.411175 17.940802 25.640824 16.441406 25.867188 C 15.691708 25.980369 15.083306 26.093481 14.654297 26.179688 C 14.439792 26.222787 14.270205 26.258358 14.150391 26.285156 C 14.090481 26.298556 14.043261 26.309979 14.007812 26.318359 C 13.972362 26.326759 14.028242 26.308563 13.902344 26.3457..."/></svg>
            <span class="ml-2">Jam</span>
          </a>

          {{-- Sección: Perfil de usuario --}}
          <a href="{{ route('dashboard') }}" class="hover:opacity-80 transition-opacity flex items-center">
            <!-- Icono Mi perfil (avatar con engranaje) -->
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <!-- Silueta de usuario -->
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 20c0-3.314 2.686-6 6-6s6 2.686 6 6" />
              <!-- Engranaje pequeño -->
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19.4 15.6l.6-1.04a1 1 0 00-.27-1.31l-1.12-.7a1 1 0 00-1.21.12l-.78.78a2.5 2.5 0 00-1.42 0l-.78-.78a1 1 0 00-1.21-.12l-1.12.7a1 1 0 00-.27 1.31l.6 1.04a2.5 2.5 0 000 1.42l-.6 1.04a1 1 0 00.27 1.31l1.12.7a1 1 0 001.21-.12l.78-.78a2.5 2.5 0 001.42 0l.78.78a1 1 0 001.21.12l1.12-.7a1 1 0 00.27-1.31l-.6-1.04a2.5 2.5 0 000-1.42z" />
            </svg>
            <span class="ml-2">Mi perfil</span>
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
                  {{-- Sección: Inicio --}}
          <a href="{{ route('inicio') }}" class="hover:opacity-80 transition-opacity flex items-center">
            <!-- Icono Inicio -->
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9.75L12 3l9 6.75v10.5a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 20.25V9.75z" />
            </svg>
            <span class="ml-2">Inicio</span>
          </a>
          
          {{-- Sección: Clases --}}
          <a href="{{ route('clases') }}" class="hover:opacity-80 transition-opacity flex items-center">
            <!-- Icono Clases (horario) -->
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <!-- Contorno del calendario -->
              <rect x="3" y="4" width="18" height="18" rx="2" ry="2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <!-- Línea de cabecera -->
              <line x1="3" y1="10" x2="21" y2="10" stroke-width="2" stroke-linecap="round" />
              <!-- Columnas de horario -->
              <line x1="8" y1="4" x2="8" y2="22" stroke-width="2" stroke-linecap="round" />
              <line x1="16" y1="4" x2="16" y2="22" stroke-width="2" stroke-linecap="round" />
            </svg>
            <span class="ml-2">Clases</span>
          </a>

          {{-- Sección: Entrenadores --}}
          <a href="{{ route('entrenadores.index') }}" class="hover:opacity-80 transition-opacity flex items-center">
            <!-- Icono Entrenadores (grupo) -->
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM23 17c0 1.657-1.343 3-3 3H4c-1.657 0-3-1.343-3-3" />
            </svg>
            <span class="ml-2">Entrenadores</span>
          </a>

          {{-- Sección: Foro --}}
          <a href="{{ route('foro.index') }}" class="hover:opacity-80 transition-opacity flex items-center">
            <!-- Icono Foro (chat bubbles) -->
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <!-- Burbuja de chat principal -->
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 12c0 4.418-4.03 8-9 8-1.78 0-3.428-.454-4.876-1.247L3 21l1.247-4.628A8.932 8.932 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
              <!-- Tres puntos de conversación -->
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 10h.01M12 10h.01M16 10h.01" />
            </svg>
            <span class="ml-2">Foro</span>
          </a>
          
          {{-- Sección: Rutina --}}
          <a href="{{ route('playlists.show', ['playlistId' => 'PLz-l7oWFJS0JpFK3d3qSGbMSpcKjZgQI6']) }}" class="hover:opacity-80 transition-opacity flex items-center">
            <!-- Icono Rutina (checklist) -->
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <!-- Clipbord outline -->
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 2h6a2 2 0 012 2v2H7V4a2 2 0 012-2z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 6h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V8a2 2 0 012-2z" />
              <!-- Check items -->
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 17l2 2 4-4" />
            </svg>
            <span class="ml-2">Rutina</span>
          </a>

          {{-- Sección: Suscripciones --}}
          <a href="{{ route('suscripciones') }}" class="hover:opacity-80 transition-opacity flex items-center">
            <!-- Icono Suscripciones (tarjeta de pago) -->
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <!-- Contorno de tarjeta -->
              <rect x="2" y="7" width="20" height="12" rx="2" ry="2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <!-- Banda magnética -->
              <line x1="2" y1="11" x2="22" y2="11" stroke-width="2" stroke-linecap="round" />
              <!-- Chip de la tarjeta -->
              <rect x="6" y="13" width="4" height="3" rx="1" ry="1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span class="ml-2">Suscripciones</span>
          </a>

          {{-- Sección: Contacto --}}
          <a href="{{ route('contacto') }}" class="hover:opacity-80 transition-opacity flex items-center">
            <!-- Icono Contacto -->
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            <span class="ml-2">Contacto</span>
          </a>

          {{-- Sección: JAM --}}
          <a href="{{ route('jam.index') }}" class="hover:opacity-80 transition-opacity flex items-center">
            <!-- Icono JAM (Spotify) -->
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
              <path d="M 25 1.9902344 C 12.266865 1.9902344 1.9902344 12.266865 1.9902344 25 C 1.9902344 37.733135 12.266865 48.009766 25 48.009766 C 37.733135 48.009766 48.009766 37.733135 48.009766 25 C 48.009766 12.266865 37.733135 1.9902344 25 1.9902344 z M 25 4.0097656 C 36.650865 4.0097656 45.990234 13.349135 45.990234 25 C 45.990234 36.650865 36.650865 45.990234 25 45.990234 C 13.349135 45.990234 4.0097656 36.650865 4.0097656 25 C 4.0097656 13.349135 13.349135 4.0097656 25 4.0097656 z M 21.933594 14 C 16.000841 14 11.536373 15.027452 11.318359 15.078125 L 11.316406 15.078125 L 11.316406 15.080078 C 9.7155259 15.453865 8.7059511 17.079339 9.078125 18.679688 C 9.450288 20.281477 11.075526 21.288538 12.675781 20.921875 L 12.683594 20.921875 L 12.689453 20.919922 C 12.575843 20.947632 12.739283 20.908042 12.859375 20.882812 C 12.979472 20.857582 13.156783 20.822622 13.386719 20.779297 C 13.846591 20.692637 14.514202 20.576349 15.345703 20.460938 C 17.008724 20.230114 19.325722 20 21.933594 20 L 21.996094 20 C 26.308988 20.0059 32.506391 20.667785 37.480469 23.587891 L 37.482422 23.587891 L 37.482422 23.589844 C 37.954848 23.865283 38.481566 24 38.998047 24 C 40.027098 24 41.03278 23.462606 41.587891 22.517578 C 42.4204 21.099781 41.937951 19.245598 40.519531 18.412109 C 34.27637 14.746763 27.008921 14.007143 22.003906 14 L 21.933594 14 z M 21.933594 16 L 22.003906 16 C 26.808831 16.007 33.751684 16.758455 39.505859 20.136719 C 39.99344 20.42323 40.148772 21.019657 39.863281 21.505859 C 39.672394 21.830832 39.340995 22 38.998047 22 C 38.827923 22 38.658397 21.95814 38.494141 21.863281 L 38.490234 21.861328 C 33.0131 18.647428 26.504103 18.006131 21.998047 18 L 21.933594 18 C 19.208465 18 16.806263 18.239792 15.072266 18.480469 C 14.205267 18.600807 13.504003 18.72047 13.015625 18.8125 C 12.771436 18.85852 12.58045 18.8978 12.447266 18.925781 C 12.322091 18.952081 12.331069 18.948276 12.230469 18.972656 C 11.674724 19.099993 11.153228 18.776774 11.025391 18.226562 C 10.897698 17.677484 11.221452 17.156242 11.769531 17.027344 C 11.921515 16.992022 16.232346 16 21.933594 16 z M 21.992188 22.001953 C 19.485831 22.022933 17.321981 22.257131 15.742188 22.498047 C 14.162394 22.738963 13.265055 22.956785 12.976562 23.039062 C 11.545298 23.4449 10.697078 24.961798 11.103516 26.394531 C 11.511255 27.828702 13.027844 28.672719 14.458984 28.265625 L 14.464844 28.263672 L 14.46875 28.263672 C 14.49469 28.257572 14.53521 28.248108 14.587891 28.236328 C 14.69326 28.212768 14.848723 28.180835 15.048828 28.140625 C 15.449038 28.060205 16.026057 27.951569 16.740234 27.84375 C 18.168588 27.628113 20.142467 27.410079 22.322266 27.390625 C 26.185509 27.356565 30.567753 27.924285 34.84375 30.587891 C 35.289626 30.867749 35.792755 31.001953 36.28125 31.001953 C 37.187002 31.001953 38.077741 30.54265 38.589844 29.722656 C 39.378024 28.458742 38.985326 26.765566 37.720703 25.978516 C 32.336064 22.623808 26.560664 21.964096 21.992188 22.001953 z M 22.009766 24 C 26.371289 23.96386 31.724703 24.598489 36.664062 27.675781 C 37.00944 27.890731 37.108398 28.317977 36.892578 28.664062 C 36.752681 28.88807 36.521498 29.001953 36.28125 29.001953 C 36.149745 29.001953 36.024374 28.968673 35.90625 28.894531 L 35.904297 28.892578 C 31.213033 25.969431 26.380741 25.35469 22.304688 25.390625 C 20.002485 25.411175 17.940802 25.640824 16.441406 25.867188 C 15.691708 25.980369 15.083306 26.093481 14.654297 26.179688 C 14.439792 26.222787 14.270205 26.258358 14.150391 26.285156 C 14.090481 26.298556 14.043261 26.309979 14.007812 26.318359 C 13.972362 26.326759 14.028242 26.308563 13.902344 26.3457..."/></svg>
            <span class="ml-2">Jam</span>
          </a>
          
          {{-- Sección: Perfil de usuario --}}
          <a href="{{ route('dashboard') }}" class="hover:opacity-80 transition-opacity flex items-center">
            <!-- Icono Mi perfil (avatar con engranaje) -->
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <!-- Silueta de usuario -->
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 20c0-3.314 2.686-6 6-6s6 2.686 6 6" />
              <!-- Engranaje pequeño -->
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19.4 15.6l.6-1.04a1 1 0 00-.27-1.31l-1.12-.7a1 1 0 00-1.21.12l-.78.78a2.5 2.5 0 00-1.42 0l-.78-.78a1 1 0 00-1.21-.12l-1.12.7a1 1 0 00-.27 1.31l.6 1.04a2.5 2.5 0 000 1.42l-.6 1.04a1 1 0 00.27 1.31l1.12.7a1 1 0 001.21-.12l.78-.78a2.5 2.5 0 001.42 0l.78.78a1 1 0 001.21.12l1.12-.7a1 1 0 00.27-1.31l-.6-1.04a2.5 2.5 0 000-1.42z" />
            </svg>
            <span class="ml-2">Mi perfil</span>
          </a>
        </nav>
      </nav>
    </div>
  </div>
</header>
