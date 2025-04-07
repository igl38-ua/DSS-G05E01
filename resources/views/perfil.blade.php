{{-- resources/views/perfil.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Perfil de Usuario</h1>

    <div class="bg-white rounded shadow p-6">
        <p><strong>Nombre:</strong> {{ $user->nombre }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        
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
        <form action="{{ route('logout') }}" method="POST" class="mt-6">
            @csrf
            <button 
                type="submit" 
                class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded"
            >
                Cerrar Sesión
            </button>
        </form>
    </div>
</div>
@endsection
