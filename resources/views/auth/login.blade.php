{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-6">
    <div class="bg-white rounded-lg shadow-md p-8 w-full max-w-md">
        {{-- Nota: Corrige los caracteres como 'ó' a '�' si tu editor/archivo no est� en UTF-8 --}}
        <h2 class="text-2xl font-bold mb-2">Iniciar sesión</h2>
        <p class="text-gray-600 mb-6 text-sm">
            Introduce tu dirección de correo y contraseña para acceder.
        </p>

        @if(session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        @error('email')
            <div class="mb-4 font-medium text-sm text-red-600">
                {{ $message }}
            </div>
        @enderror

        {{-- Muestra errores generales o de Google si existen --}}
        @if (session('error'))
            <div class="mb-4 p-3 bg-red-100 text-red-700 border border-red-300 rounded text-sm">
                {{ session('error') }}
            </div>
        @endif
        {{-- Muestra errores de validación del formulario normal --}}
         @if($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 border border-red-300 rounded text-sm">
                 <ul class="list-disc list-inside">
                     @foreach($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                 </ul>
            </div>
        @endif


        {{-- FORMULARIO DE LOGIN NORMAL --}}
        <form method="POST" action="{{ route('login.store') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    Dirección de correo
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                             <path d="M2.94 6.33l6.33 3.16a2 2 0 0 0 1.46 0l6.33-3.16A2 2 0 0 0 16 4H4a2 2 0 0 0-1.06 2.33zM18 8.09l-6.32 3.16a4 4 0 0 1-2.92 0L2.44 8.09 2 8.28V14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8.28l-.44-.19z"/>
                         </svg>
                    </span>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        class="pl-9 pr-3 py-2 w-full border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-purple-500"
                        placeholder="email@ejemplo.com"
                        required
                        autofocus
                        value="{{ old('email') }}" {{-- Añadido old('email') --}}
                    >
                </div>
            </div>

            <div class="mb-2">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    Contraseña
                </label>
                <div class="relative">
                     <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                         <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                             <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2h1a1 1 0 011 1v7a1 1 0 01-1 1H4a1 1 0 01-1-1v-7a1 1 0 011-1h1zm2-2v2h6V7a3 3 0 00-6 0z" clip-rule="evenodd"/>
                         </svg>
                     </span>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="pl-9 pr-3 py-2 w-full border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-purple-500"
                        placeholder="●●●●●●●●●●●"
                        required
                    >
                </div>
            </div>

            <div class="text-right mb-4">
                 <a href="{{ route('password.request') }}" class="text-sm text-purple-600 hover:underline">
                     ¿Contraseña olvidada?
                 </a>
            </div>

             <div class="mb-4"> {{-- Movido aquí para mejor flujo antes del submit --}}
                <label class="inline-flex items-center text-sm text-gray-600">
                    <input type="checkbox" name="remember" id="remember" class="form-checkbox h-4 w-4 text-purple-600">
                    <span class="ml-2">Recuérdame</span>
                </label>
             </div>

            <button
                type="submit"
                class="w-full bg-gradient-to-r from-indigo-500 to-purple-700 text-white text-white font-semibold py-2 rounded transition-colors mb-4" {{-- A�adido mb-4 --}}
            >
                Iniciar sesión
            </button>

             {{-- SEPARADOR VISUAL (Opcional) --}}
             <div class="relative my-4">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">O continua con</span>
                </div>
            </div>

            <a
                href="{{ route('google.redirect') }}"  {{-- �LA CLAVE! Llama a la ruta de redirecci�n --}}
                class="w-full border border-gray-300 bg-white text-gray-700 font-semibold py-2 rounded flex items-center justify-center hover:bg-gray-100 transition-colors"
            >
                <svg class="w-5 h-5 mr-2" viewBox="0 0 48 48">
                    <path fill="#EA4335" d="M24 9.5c3.94 0 7.09 1.63 9.26 3l6.84-6.84C35.39 2.58 30.08 0 24 0 14.73 0 6.39 5.59 2.57 13.67l8.46 6.57C12.74 14.08 17.84 9.5 24 9.5z"/>
                    <path fill="#4285F4" d="M46.64 24.52c0-1.64-.15-3.2-.42-4.74H24v9h12.66c-.54 2.88-2.18 5.32-4.64 7l7.34 5.7c4.3-3.96 6.78-9.8 6.78-16.96z"/>
                    <path fill="#FBBC05" d="M10.91 27.91c-.39-1.16-.61-2.4-.61-3.68 0-1.28.22-2.52.61-3.68l-8.46-6.57C1.35 17.39 0 20.57 0 24c0 3.43 1.35 6.61 3.73 9.02l8.46-6.57z"/>
                    <path fill="#34A853" d="M24 48c6.48 0 11.92-2.15 15.89-5.83l-7.34-5.7c-2.06 1.39-4.71 2.19-7.55 2.19-6.16 0-11.26-4.58-12.48-10.71l-8.46 6.57C6.39 42.41 14.73 48 24 48z"/>
                    <path fill="none" d="M0 0h48v48H0z"/>
                </svg>
                <span>Iniciar sesion con Google</span> {{-- Texto corregido y envuelto en span --}}
            </a>
            </form> {{-- Cierre del formulario principal --}}

        <div class="text-center mt-6 text-sm"> {{-- Ajustado margen superior --}}
            ¿No tienes cuenta?
            <a href="{{ route('register.index') }}" class="text-purple-600 hover:underline">
                Pincha aqui
            </a>
        </div>

    </div>
</div>
@endsection