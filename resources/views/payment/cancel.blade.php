@extends('layouts.app')

@section('content')
<div class="flex-grow px-20 py-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 my-8">
    <!-- Hero -->
    <div class="bg-gradient-to-r from-red-500 to-pink-600 text-white rounded-xl p-8 text-center mb-8">
        <h2 class="text-3xl font-bold">Pago Cancelado</h2>
        <p class="mt-2">Tu pago no se ha completado. Si quieres intentarlo de nuevo, utiliza el botón que aparece más abajo.</p>
    </div>

    <!-- Detalles del pedido -->
    <div class="bg-gray-50 w-full p-6 rounded-xl shadow text-center">
        <h5 class="uppercase text-sm font-bold text-gray-600">Pedido Nº {{ $pedido->id }}</h5>
        <p class="text-gray-700 mt-4">
        Importe: <strong>{{ number_format($pedido->amount, 2) }} €</strong><br>
        Plan: <strong>{{ ucfirst($pedido->plan) }}</strong><br>
        Fecha: <strong>{{ $pedido->created_at->format('d/m/Y H:i') }}</strong>
        </p>

        <a
        href="{{ route('payment.checkout', $pedido->id) }}"
        class="mt-6 inline-block px-6 py-2 bg-yellow-500 text-white rounded-xl hover:bg-yellow-600 transition"
        >
        Reintentar Pago
        </a>
        <a
        href="{{ url('/') }}"
        class="mt-4 inline-block px-6 py-2 border border-gray-800 text-gray-800 rounded hover:bg-gray-100 transition"
        >
        Volver al inicio
        </a>
    </div>
    </div>
</div>
@endsection
