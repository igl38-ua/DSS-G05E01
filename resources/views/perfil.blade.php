@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col justify-center bg-gray-100 py-6">
    <div class="bg-white rounded-lg shadow-md p-8 w-full max-w-md mx-auto">
        <h1 class="text-2xl font-bold mb-4">Perfil de Usuario</h1>

        <div class="mb-4">
            <p><strong>Nombre:</strong> {{ $user->nombre }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>

        <!-- Botón para administradores -->
        @if($user->rol === 'admin')
            <div class="mt-4">
                <a 
                    href="{{ route('admin.dashboard') }}" 
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded inline-block"
                >
                    Panel de Administración
                </a>
            </div>
        @endif

        <!-- Botón de logout -->
        <div class="mt-6">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button 
                    type="submit" 
                    class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded"
                >
                    Cerrar Sesión
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
