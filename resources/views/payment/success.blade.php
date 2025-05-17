@extends('layouts.app')

@section('content')
<div class="flex-grow px-20 py-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 my-8">
    <!-- Hero -->
    <div class="bg-gradient-to-r from-indigo-500 to-purple-700 text-white rounded-xl p-8 text-center mb-8">
        <h2 class="text-3xl font-bold">Pago Exitoso</h2>
        <p class="mt-2">¡Gracias! Tu pago se ha procesado correctamente.</p>
    </div>

    <!-- Detalles del pedido -->
    <div class="bg-gray-50 w-full p-6 rounded-xl shadow text-center">
        <h5 class="uppercase text-sm font-bold text-gray-600">Resumen de Pago</h5>
        <p class="text-4xl font-extrabold text-gray-900 mt-4">{{ number_format($pedido->amount, 2) }} €</p>
        <p class="text-gray-700 mt-4">
        Pedido Nº: <strong>{{ $pedido->id }}</strong><br>
        Plan: <strong>{{ ucfirst($pedido->plan) }}</strong><br>
        Transacción: <strong>{{ $pedido->gateway_response['transaction_id'] ?? '—' }}</strong><br>
        Fecha: <strong>{{ $pedido->created_at->format('d/m/Y H:i') }}</strong>
        </p>

        <a
        href="{{ url('/') }}"
        class="mt-6 inline-block px-6 py-2 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition"
        >
        Volver al inicio
        </a>
    </div>
    </div>
</div>
@endsection
