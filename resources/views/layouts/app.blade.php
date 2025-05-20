<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>
<body class="flex flex-col bg-gray-50 min-h-screen">
    
    @include('partials.header')
    
    @yield('content')
    
    @include('partials.footer')

    <!-- Agregar Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    {{-- Chatbot trigger + widget --}}
    <div class="fixed bottom-6 right-6 z-50" x-data="{ open: false }">
      <!-- Botón circular -->
      <button
        id="chatbot-circle"
        @click="open = !open"
        class="w-16 h-16 bg-indigo-600 hover:bg-indigo-700 text-white rounded-full shadow-lg flex items-center justify-center transition transform hover:scale-105"
        aria-label="Abrir chat"
      >
        <i class="fas fa-comments fa-lg"></i>
      </button>

      <!-- Widget de chat -->
      <div
        id="chatbot-widget"
        x-show="open"
        x-cloak
        class="fixed bottom-24 right-6 w-80 h-96 bg-white rounded-xl shadow-xl flex flex-col overflow-hidden"
        style="display: none;"
      >
      <div class="p-4 bg-indigo-600 text-white overflow-y-auto rounded-lg transition">
        Hola soy Topuria de Smart Fit, ¿A dónde quieres ir?
      </div>
        {{-- Contenedor de mensajes --}}
        <div id="chatbot-messages" class="flex-1 p-4 overflow-y-auto space-y-1 bg-gray-50"></div>
        {{-- Zona de input --}}
        <div class="border-t border-gray-200 p-2 flex bg-white">
          <input
            id="chatbot-input"
            type="text"
            placeholder="Escribe tu mensaje…"
            class="flex-1 border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400"
          >
          <button
            id="chatbot-send"
            class="ml-2 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition"
          >
            Enviar
          </button>
        </div>
      </div>
    </div>

    {{-- Configuración global para el script --}}
    <script>
      window.chatbotConfig = {
        endpoint: "{{ route('chatbot.message') }}",
        csrfToken: "{{ csrf_token() }}",
        
      };
    </script>

    {{-- Tu lógica en public/js/chatbot.js --}}
    <script src="{{ asset('js/chatbot.js') }}" defer></script>
</body>
</html>