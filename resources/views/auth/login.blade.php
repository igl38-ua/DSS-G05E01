{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-6">
    <div class="bg-white rounded-lg shadow-md p-8 w-full max-w-md">
        <!-- Título principal -->
        <h2 class="text-2xl font-bold mb-2">Iniciar sesión</h2>
        <p class="text-gray-600 mb-6 text-sm">
            Inicia sesión ingresando tu dirección de correo electrónico y contraseña.
        </p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Campo de correo -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    Dirección de correo
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <!-- Ícono de correo (ej: heroicons) -->
                        <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.94 6.33l6.33 3.16a2 2 0 0 0 1.46 0l6.33-3.16A2 2 0 0 0 16 4H4a2 2 0 0 0-1.06 2.33zM18 8.09l-6.32 3.16a4 4 0 0 1-2.92 0L2.44 8.09 2 8.28V14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8.28l-.44-.19z"/>
                        </svg>
                    </span>
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        class="pl-9 pr-3 py-2 w-full border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-purple-500"
                        placeholder="email@address.com"
                        required 
                        autofocus
                    >
                </div>
            </div>

            <!-- Campo de contraseña -->
            <div class="mb-2">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    Contraseña
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <!-- Ícono de candado -->
                        <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2h1a1 1 0 011 1v7a1 1 0 01-1 1H4a1 1 0 01-1-1v-7a1 1 0 011-1h1zm2-2v2h6V7a3 3 0 00-6 0z" clip-rule="evenodd"/>
                        </svg>
                    </span>
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        class="pl-9 pr-3 py-2 w-full border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-purple-500"
                        required
                    >
                </div>
            </div>

            <!-- Enlace "¿Contraseña olvidada?" -->
            <div class="text-right mb-4">
                <a href="{{ route('password.request') }}" class="text-sm text-purple-600 hover:underline">
                    ¿Contraseña olvidada?
                </a>
            </div>

            <!-- Botón de Iniciar sesión -->
            <button 
                type="submit" 
                class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 rounded transition-colors"
            >
                Inicia sesión
            </button>

            <!-- Recordarme + Google Login -->
            <div class="flex items-center justify-between mt-4">
                <label class="inline-flex items-center text-sm text-gray-600">
                    <input type="checkbox" name="remember" class="form-checkbox h-4 w-4 text-purple-600">
                    <span class="ml-2">Recuérdame</span>
                </label>
            </div>

            <!-- Botón de Google -->
            <button 
                type="button" 
                class="mt-4 w-full border border-gray-300 bg-white text-gray-700 font-semibold py-2 rounded flex items-center justify-center hover:bg-gray-100 transition-colors"
            >
                <!-- Ícono de Google (ejemplo) -->
                <svg class="w-5 h-5 mr-2" viewBox="0 0 48 48">
                    <path fill="#EA4335" d="M24 9.5c3.94 0 7.09 1.63 9.26 3l6.84-6.84C35.39 2.58 30.08 0 24 0 14.73 0 6.39 5.59 2.57 13.67l8.46 6.57C12.74 14.08 17.84 9.5 24 9.5z"/>
                    <path fill="#4285F4" d="M46.64 24.52c0-1.64-.15-3.2-.42-4.74H24v9h12.66c-.54 2.88-2.18 5.32-4.64 7l7.34 5.7c4.3-3.96 6.78-9.8 6.78-16.96z"/>
                    <path fill="#FBBC05" d="M10.91 27.91c-.39-1.16-.61-2.4-.61-3.68 0-1.28.22-2.52.61-3.68l-8.46-6.57C1.35 17.39 0 20.57 0 24c0 3.43 1.35 6.61 3.73 9.02l8.46-6.57z"/>
                    <path fill="#34A853" d="M24 48c6.48 0 11.92-2.15 15.89-5.83l-7.34-5.7c-2.06 1.39-4.71 2.19-7.55 2.19-6.16 0-11.26-4.58-12.48-10.71l-8.46 6.57C6.39 42.41 14.73 48 24 48z"/>
                    <path fill="none" d="M0 0h48v48H0z"/>
                </svg>
                Inicia sesión con Google
            </button>

            <!-- Enlace de registro -->
            <div class="text-center mt-4 text-sm">
                ¿No tienes cuenta? 
                <a href="{{ route('register') }}" class="text-purple-600 hover:underline">
                    Pincha aquí
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
