{{-- resources/views/suscripciones.blade.php --}}
@extends('layouts.app')

@section('content')
<div 
  x-data="{
    payment: 'monthly',
    discount: 0.2,
    prices: {
      basico: 24.99,
      dorado: 34.99,
      platino: 44.99
    }
  }"
  class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-8"
>

    <!-- Sección tipo 'hero' en forma de rectángulo con esquinas redondeadas -->
    <div class="bg-gradient-to-r from-indigo-500 to-purple-700 text-white rounded-xl p-8 text-center mb-8">
        <h2 class="text-3xl font-bold">Elige tu plan</h2>
        <p class="mt-2 text-white">
            Elige tu plan según tus exigencias y necesidades en nuestro gimnasio
        </p>
    </div>

    <!-- Botones de selección de modo de pago -->
    <div class="flex justify-center items-center gap-4 mb-8">
    <!-- Pago mensual -->
    <button
        @click="payment = 'monthly'"
        :class="payment === 'monthly'
        ? 'bg-gradient-to-r from-indigo-500 to-purple-700 text-white'
        : 'bg-gray-200 text-gray-700'"
        class="px-6 py-2 rounded-xl transition duration-300 ease-in-out focus:outline-none"
    >
        Pago mensual
    </button>

    <!-- Pago anual -->
    <button
        @click="payment = 'annual'"
        :class="payment === 'annual'
        ? 'bg-gradient-to-r from-indigo-500 to-purple-700 text-white'
        : 'bg-gray-200 text-gray-700'"
        class="px-6 py-2 rounded-xl transition duration-300 ease-in-out focus:outline-none"
    >
        Pago anual
    </button>

    <!-- Badge de descuento (solo si anual) -->
    <buttonw
        class="bg-yellow-400 text-white px-4 py-2 rounded font-semibold hover:bg-yellow-500 transition-colors"
    >
        ¡Descuento 20%!
    </button>
    </div>


    <!-- Sección de planes (Básico, Dorado, Platino) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <!-- Plan Básico -->
        @include('suscripciones.basico')
        <!-- Plan Dorado -->
        @include('suscripciones.dorado')
        <!-- Plan Platino -->
        @include('suscripciones.platino')
    </div>

    <!-- Comparación de los planes -->
    <h2 class="text-2xl font-bold text-center mb-2">Comparación de los planes</h2>
    <p class="text-center text-gray-600 mb-8">
        Compara los planes para elegir el mejor para ti
    </p>

    <div class="overflow-x-auto w-full">
        <table class="w-full table-auto border border-gray-200 text-center">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 px-4 border-b border-gray-200">Funciones</th>
                    <th class="py-3 px-4 border-b border-gray-200">Básico</th>
                    <th class="py-3 px-4 border-b border-gray-200">Dorado</th>
                    <th class="py-3 px-4 border-b border-gray-200">Platino</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-3 px-4 border-b border-gray-200">Entradas semanales</td>
                    <td class="py-3 px-4 border-b border-gray-200">5</td>
                    <td class="py-3 px-4 border-b border-gray-200">Ilimitadas</td>
                    <td class="py-3 px-4 border-b border-gray-200">Ilimitadas</td>
                </tr>
                <tr>
                    <td class="py-3 px-4 border-b border-gray-200">Descuento entrenadores</td>
                    <td class="py-3 px-4 border-b border-gray-200">No</td>
                    <td class="py-3 px-4 border-b border-gray-200">20%</td>
                    <td class="py-3 px-4 border-b border-gray-200">50%</td>
                </tr>
                <tr>
                    <td class="py-3 px-4 border-b border-gray-200">Dieta personalizada</td>
                    <td class="py-3 px-4 border-b border-gray-200">No</td>
                    <td class="py-3 px-4 border-b border-gray-200">Opcional</td>
                    <td class="py-3 px-4 border-b border-gray-200">Incluida</td>
                </tr>
                <tr>
                    <td class="py-3 px-4 border-b border-gray-200">Reservas anticipadas</td>
                    <td class="py-3 px-4 border-b border-gray-200">No</td>
                    <td class="py-3 px-4 border-b border-gray-200">No</td>
                    <td class="py-3 px-4 border-b border-gray-200">Sí</td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <br>
</div>
@endsection
