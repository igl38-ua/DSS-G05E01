@extends('layouts.app')

@section('content')
<div class="flex-grow px-20 py-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 my-8">
        <!-- Hero -->
        <div class="bg-gradient-to-r from-indigo-500 to-purple-700 text-white rounded-xl p-8 text-center mb-8">
            <h2 class="text-3xl font-bold">Resumen del Pedido</h2>
            <p class="mt-2">Verifica los detalles antes de proceder con el pago.</p>
        </div>

        <!-- Card de Resumen -->
        <div class="bg-gray-50 w-full p-6 rounded-xl shadow mb-8 flex flex-col">
            <h5 class="uppercase text-sm font-bold text-gray-600">Plan: {{ ucfirst($plan) }}</h5>

            <p class="text-4xl font-extrabold text-gray-900 mt-4">
                {{ number_format($amount, 2) }} €
                <span class="text-sm text-gray-600" @if($period !== 'annual') style="display:none" @endif>/año</span>
                <span class="text-sm text-gray-600" @if($period === 'annual') style="display:none" @endif>/mes</span>
            </p>

            @if(isset($monthlyEquivalent) && $period === 'annual')
                <p class="text-lg text-gray-600 mt-1">
                    {{ number_format($monthlyEquivalent, 2) }} €/mes 
                </p>
            @endif

            <p class="text-gray-700 mt-4">
                Usuario: {{ $user->nombre }}<br>
                Email: {{ $user->email }}
            </p>

            <form action="{{ route('payment.create', $plan) }}" method="POST" class="mt-6">
                @csrf
                <input type="hidden" name="period" value="{{ $period }}">
                <button type="submit"
                    class="px-6 py-2 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition"
                >
                    Proceder al pago
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
