{{-- resources/views/auth/forgot-password.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-6">
    <div class="bg-white rounded-lg shadow-md p-8 w-full max-w-md">
        <!-- Título -->
        <h2 class="text-2xl font-bold mb-2">Recuperar contraseña</h2>
        <p class="text-gray-600 mb-6 text-sm">
            Ingresa tu dirección de correo electrónico y te enviaremos un enlace para restablecer tu contraseña.
        </p>

        <!-- Formulario -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    Correo electrónico
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <!-- Ícono de correo -->
                        <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.94 6.33l6.33 3.16a2 2 0 0 0 1.46 0l6.33-3.16A2 2 0 0 0 16 4H4a2 2 0 0 0-1.06 2.33zM18 8.09l-6.32 3.16a4 4 0 0 1-2.92 0L2.44 8.09 2 8.28V14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8.28l-.44-.19z"/>
                        </svg>
                    </span>
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        placeholder="email@ejemplo.com" 
                        class="pl-9 pr-3 py-2 w-full border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-purple-500" 
                        required 
                        autofocus
                    >
                </div>
            </div>

            <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 rounded transition-colors">
                Enviar enlace de restablecimiento
            </button>
        </form>

        <!-- Enlace para volver al login -->
        <div class="text-center mt-4 text-sm">
            <a href="{{ route('login.index') }}" class="text-purple-600 hover:underline">
                Volver a iniciar sesión
            </a>
        </div>
    </div>
</div>
@endsection
