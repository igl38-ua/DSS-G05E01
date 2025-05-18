@extends('layouts.app')

@section('content')
<div class="flex-grow px-20 py-20">
    <div class="max-w-lg mx-auto px-4 sm:px-6 lg:px-8 my-8">
        <!-- Hero -->
        <div class="bg-gradient-to-r from-indigo-500 to-purple-700 text-white rounded-xl p-8 text-center mb-8">
            <h2 class="text-3xl font-bold">Checkout</h2>
            <p class="mt-2">Introduce los datos de tu tarjeta para procesar el pago.</p>
        </div>

        <!-- Formulario de Pago -->
        <div class="bg-gray-50 w-full p-6 rounded-xl shadow">
            <!-- resources/views/payment/checkout.blade.php -->
            <form
            action="{{ route('payment.process', $pedido->id) }}"
            method="POST"
            autocomplete="on"              {{-- permite autocompletar todo el formulario --}}
            class="bg-gray-50 w-full p-6 rounded-xl shadow"
            >
            @csrf

            <div class="mb-4">
                <label for="card_holder_name" class="block text-gray-700">Titular de la tarjeta</label>
                <input
                type="text"
                id="card_holder_name"
                name="card_holder_name"
                autocomplete="cc-name"       {{-- nombre en la tarjeta --}}
                class="mt-1 block w-full border-gray-300 rounded"
                placeholder="Nombre en la tarjeta"
                required
                >
            </div>

            <div class="mb-4">
                <label for="card_number" class="block text-gray-700">Número de tarjeta</label>
                <input
                type="text"
                id="card_number"
                name="card_number"
                autocomplete="cc-number"     {{-- número de tarjeta --}}
                class="mt-1 block w-full border-gray-300 rounded"
                placeholder="1234 5678 9012 3456"
                required
                >
            </div>

            <div class="flex gap-4 mb-4">
                <div class="w-1/2">
                <label for="expiry_date" class="block text-gray-700">Fecha de expiración</label>
                <input
                    type="text"
                    id="expiry_date"
                    name="expiry_date"
                    autocomplete="cc-exp"       {{-- mes/año --}}
                    class="mt-1 block w-full border-gray-300 rounded"
                    placeholder="MM/AA"
                    required
                >
                </div>
                <div class="w-1/2">
                <label for="cvv" class="block text-gray-700">CVV</label>
                <input
                    type="text"
                    id="cvv"
                    name="cvv"
                    autocomplete="cc-csc"       {{-- código de seguridad --}}
                    class="mt-1 block w-full border-gray-300 rounded"
                    placeholder="123"
                    required
                >
                </div>
            </div>

            <button
                type="submit"
                class="w-full px-6 py-2 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition"
            >
                Pagar {{ number_format($pedido->amount, 2) }} €
            </button>
            </form>

        </div>
    </div>
</div>
@endsection