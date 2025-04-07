{{-- resources/views/perfil.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Perfil de Usuario</h1>

    <div class="bg-white rounded shadow p-6">
        <p><strong>Nombre:</strong> {{ $user->nombre }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <!-- Puedes agregar más información del usuario si la tienes -->

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
