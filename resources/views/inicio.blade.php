{{-- resources/views/inicio.blade.php --}}
@extends('layouts.app')

@section('content')
<!-- Sección 'hero' con texto y botones de acción -->
<header class="bg-gradient-to-r from-indigo-500 to-purple-700 text-white py-8">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4">
                ¡Empieza ahora por 9,99€/4 semanas!
            </h1>
            <p class="text-lg md:text-xl mb-6">
                Y llévate una mochila de regalo. Entrena con los mejores instructores y las instalaciones más modernas.
            </p>
            <div class="flex flex-wrap gap-4">
                <!-- Botón principal: tono oscuro de violeta -->
                <a href="{{ route('register.index') }}"
                   class="bg-purple-800 hover:bg-purple-900 text-white font-semibold px-5 py-2 shadow transition-colors">
                    Apúntate
                </a>
                
                <!-- Botón secundario: borde violeta claro -->
                <a href="{{ route('suscripciones') }}"
                   class="border border-purple-200 text-purple-100 px-5 py-2 shadow 
                          hover:bg-purple-900 hover:text-white transition-colors">
                    Ver precio
                </a>
            </div>
        </div>
    </div>
</header>


<!-- Sección de Carrusel de Imagenes (Full Width) -->
<section id="carousel-fullwidth" class="mb-8">
  <div class="relative w-full overflow-hidden">
    <div class="flex transition-transform duration-500" id="carousel-images">
      <!-- Imágenes originales -->
      <img src="{{ asset('images/slider1.jpg') }}" alt="Slider 1" class="w-full h-[700px] object-cover flex-shrink-0">
      <img src="{{ asset('images/slider2.jpg') }}" alt="Slider 2" class="w-full h-[700px] object-cover flex-shrink-0">
      <img src="{{ asset('images/slider3.jpg') }}" alt="Slider 3" class="w-full h-[700px] object-cover flex-shrink-0">
      <img src="{{ asset('images/slider4.jpg') }}" alt="Slider 4" class="w-full h-[700px] object-cover flex-shrink-0">
      <img src="{{ asset('images/slider5.jpg') }}" alt="Slider 5" class="w-full h-[700px] object-cover flex-shrink-0">
      <img src="{{ asset('images/slider6.jpg') }}" alt="Slider 6" class="w-full h-[700px] object-cover flex-shrink-0">

      <!-- Clones de las imágenes (para el bucle infinito) -->
      <img src="{{ asset('images/slider1.jpg') }}" alt="Slider 1 Clone" class="w-full h-[700px] object-cover flex-shrink-0">
      <img src="{{ asset('images/slider2.jpg') }}" alt="Slider 2 Clone" class="w-full h-[700px] object-cover flex-shrink-0">
      <img src="{{ asset('images/slider3.jpg') }}" alt="Slider 3 Clone" class="w-full h-[700px] object-cover flex-shrink-0">
      <img src="{{ asset('images/slider4.jpg') }}" alt="Slider 4 Clone" class="w-full h-[700px] object-cover flex-shrink-0">
      <img src="{{ asset('images/slider5.jpg') }}" alt="Slider 5 Clone" class="w-full h-[700px] object-cover flex-shrink-0">
      <img src="{{ asset('images/slider6.jpg') }}" alt="Slider 6 Clone" class="w-full h-[700px] object-cover flex-shrink-0">
    </div>

    <!-- Controles del carrusel -->
    <button 
      class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-gray-700 text-white px-3 py-2 opacity-0 hover:opacity-10" 
      onclick="prevSlide()"
    >
      Prev
    </button>
    <button 
      class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-gray-700 text-white px-3 py-2 opacity-0 hover:opacity-10" 
      onclick="nextSlide()"
    >
      Next
    </button>
  </div>
</section>

<script>
  // Seleccionamos el contenedor que agrupa todas las imágenes
  const carouselImages = document.getElementById('carousel-images');
  // Obtenemos la lista de hijos (las 6 imágenes)
  const slides = carouselImages.children;
  // La mitad de las imágenes corresponden al set original (3 en tu caso)
  const half = slides.length / 2; // 6/2 = 3
  let currentIndex = 0;

  // Función para actualizar la posición del carrusel
  function updateCarousel() {
    // Cada "slide" ocupa todo el ancho del contenedor .w-full
    const slideWidth = carouselImages.clientWidth;
    carouselImages.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
  }

  // Función para avanzar al siguiente slide
  function nextSlide() {
    // Si estamos en la última imagen del set original...
    if (currentIndex >= half) {
      // ... quitamos la transición para hacer el salto instantáneo
      carouselImages.style.transition = 'none';
      // Saltamos a la primera imagen real (index = 0)
      currentIndex = 0;
      updateCarousel();
      // Forzamos el reflow en el siguiente frame para que no se note el salto
      requestAnimationFrame(() => {
        requestAnimationFrame(() => {
          // Rehabilitamos la transición
          carouselImages.style.transition = 'transform 0.5s ease-in-out';
          // Avanzamos un slide para continuar el bucle
          currentIndex++;
          updateCarousel();
        });
      });
    } else {
      currentIndex++;
      updateCarousel();
    }
  }

  // Función para retroceder al slide anterior
  function prevSlide() {
    // Si estamos en la primera imagen (index = 0) y retrocedemos...
    if (currentIndex <= 0) {
      // ... quitamos la transición para saltar al final del set original
      carouselImages.style.transition = 'none';
      currentIndex = half;
      updateCarousel();
      requestAnimationFrame(() => {
        requestAnimationFrame(() => {
          carouselImages.style.transition = 'transform 0.5s ease-in-out';
          currentIndex--;
          updateCarousel();
        });
      });
    } else {
      currentIndex--;
      updateCarousel();
    }
  }

  // Avanzar automáticamente cada 5 segundos
  setInterval(nextSlide, 5000);

  // Recalcular la posición cuando cambie el tamaño de la ventana
  window.addEventListener('resize', updateCarousel);
</script>

<!-- Contenedor para el resto del contenido -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-8">


  <!-- Sección de Búsqueda -->
  <section id="busqueda" class="mb-8">
      <h2 class="text-2xl font-bold mb-4">Búsqueda</h2>
      <form action="#" method="GET" class="flex items-center space-x-2">
          <input class="border border-gray-300 rounded py-2 px-4 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" type="search" name="query" placeholder="Buscar..." aria-label="Buscar">
          <button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded transition-colors" type="submit">Buscar</button>
      </form>
  </section>

  <!-- Sección de Suscripciones -->
  <section id="suscripciones" class="mb-8">
    <h2 class="text-2xl font-bold mb-4">Suscripciones</h2>

    <!-- Ajusta la rejilla para 3 columnas en pantallas md+ -->
    <!-- Rejilla de planes -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
      <!-- ────────────────────────────  PLAN BÁSICO  ──────────────────────────── -->
      <article
        class="group relative p-8 bg-slate-50 border border-gray-300 rounded-xl shadow-sm 
              transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-xl"
      >
        <!-- anillo decorativo en hover -->
        <div
          class="pointer-events-none absolute inset-0 rounded-xl ring-0 
                transition duration-300 ease-out 
                group-hover:ring-4 group-hover:ring-indigo-400"
        ></div>

        <h3 class="text-center text-lg font-bold uppercase text-gray-700 tracking-wide mb-4">
          Básico
        </h3>

        <ul class="space-y-2 text-center text-gray-600 leading-relaxed">
          <li>Pase 3 veces por semana</li>
          <li>Posibilidad de reservar entrenadores personales</li>
        </ul>
      </article>

      <!-- ────────────────────────────  PLAN DORADO  ──────────────────────────── -->
      <article
        class="group relative p-8 bg-amber-50 border border-amber-400/60 rounded-xl shadow-sm 
              transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-xl"
      >
        <div
          class="pointer-events-none absolute inset-0 rounded-xl ring-0 
                transition duration-300 ease-out 
                group-hover:ring-4 group-hover:ring-amber-500"
        ></div>

        <h3 class="text-center text-lg font-bold uppercase text-amber-600 tracking-wide mb-4">
          Dorado
        </h3>

        <ul class="space-y-2 text-center text-gray-700 leading-relaxed">
          <li>Entradas ilimitadas</li>
          <li>Descuento de un 20 % en entrenadores personales</li>
          <li>Posibilidad de tener una dieta personalizada</li>
        </ul>
      </article>

      <!-- ────────────────────────────  PLAN PLATINO  ──────────────────────────── -->
      <article
        class="group relative p-8 bg-slate-50 border border-gray-300 rounded-xl shadow-sm 
              transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-xl"
      >
        <div
          class="pointer-events-none absolute inset-0 rounded-xl ring-0 
                transition duration-300 ease-out 
                group-hover:ring-4 group-hover:ring-sky-400"
        ></div>

        <h3 class="text-center text-lg font-bold uppercase text-gray-700 tracking-wide mb-4">
          Platino
        </h3>

        <ul class="space-y-2 text-center text-gray-600 leading-relaxed">
          <li>Entradas ilimitadas</li>
          <li>Descuento de un 50 % en entrenadores personales</li>
          <li>Dieta incluida en la suscripción</li>
          <li>Reservas antes de tiempo</li>
        </ul>
      </article>
    </div>


    <!-- Botón “reactivo” que lleva a la página de suscripciones -->
  <div class="flex justify-center">
    <button
      x-data="{ hover: false }"
      @click="window.location='{{ route('suscripciones') }}'"
      @mouseenter="hover = true"
      @mouseleave="hover = false"
      class="bg-gradient-to-r from-yellow-400 to-yellow-600 text-white font-semibold py-3 px-8 rounded-lg shadow-lg
            transition-all duration-500 ease-in-out transform"
      :class="hover ? 'scale-105 shadow-xl' : ''"
    >
      <!-- texto que ves normalmente -->
      <span x-show="!hover"
            x-transition.opacity.duration.500ms
      >Ver todos los planes</span>

      <!-- texto cuando pasas el cursor -->
      <span x-show="hover"
            x-transition.opacity.duration.500ms
      >¡Suscribirme ahora!</span>
    </button>
  </div>

  </section>


  <!-- Sección de Localizar Gimnasio -->
  <section id="localizar-gimnasio" class="mb-8">
      <h2 class="text-2xl font-bold mb-4">Localizar Gimnasio</h2>
      <div class="w-full h-96">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12508.153211225519!2d-0.5345538287701668!3d38.39436341510229!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6234073bc6dced%3A0x2428cb56fa0c4878!2sSan%20Vicente%20del%20Raspeig%2C%20Alicante!5e0!3m2!1ses!2ses!4v1742033096446!5m2!1ses!2ses" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
  </section>

  

</div>

{{-- Script mínimo para el carrusel --}}
<script>
    let currentIndex = 0;
    const carouselImages = document.getElementById('carousel-images');
    const totalImages = carouselImages.children.length;

    function updateCarousel() {
        // Cada imagen ocupa el ancho completo del contenedor
        const slideWidth = carouselImages.clientWidth;
        carouselImages.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalImages;
        updateCarousel();
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + totalImages) % totalImages;
        updateCarousel();
    }

    // Auto slide cada 5 segundos
    setInterval(nextSlide, 5000);

    // Actualiza el slide en caso de cambio de tamaño
    window.addEventListener('resize', updateCarousel);
</script>

@endsection
