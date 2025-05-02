<aside class="w-64 bg-white shadow-lg hidden lg:flex flex-col">
  <div class="p-6 border-b">
    <h2 class="text-2xl font-bold">Smart Fit</h2>
  </div>
  <nav class="flex-1 p-4 space-y-3">
    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700">
      <i class="fas fa-home mr-3 text-purple-400"></i>
      <span>Mi Perfil</span>
    </a>
    <a href="{{ route('mis-clases') }}" class="flex items-center px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700">
      <i class="fas fa-dumbbell mr-3 text-purple-400"></i>
      <span>Clases</span>
    </a>
    <a href="{{ route('mi-suscripcion') }}" class="flex items-center px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700">
      <i class="fas fa-credit-card mr-3 text-purple-400"></i>
      <span>Suscripción</span>
    </a>
    <a href="{{ route('progreso') }}" class="flex items-center px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700">
      <i class="fas fa-chart-line mr-3 text-purple-400"></i>
      <span>Progresión</span>
    </a>

    {{-- Botón Admin (solo para administradores) --}}
    @if(auth()->user()->rol === 'admin')
      <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700">
        <i class="fas fa-user-shield mr-3 text-purple-400"></i>
        <span>Administrador</span>
      </a>
    @endif

    {{-- Botón de Cerrar sesión --}}
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="w-full flex items-center px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700">
        <i class="fas fa-sign-out-alt mr-3 text-purple-400"></i>
        <span>Cerrar sesión</span>
      </button>
    </form>
  </nav>
  <div class="p-4 border-t">
    <a href="{{ route('help') }}" class="flex items-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100">
      <i class="fas fa-question-circle mr-3 text-purple-600"></i>
      <div>
        <p class="font-semibold text-sm">¿Necesitas ayuda?</p>
        <p class="text-xs text-gray-600">Visita nuestros foros o contáctanos.</p>
      </div>
    </a>
  </div>
</aside>
