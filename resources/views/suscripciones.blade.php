{{-- resources/views/suscripciones.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-8">

    <!-- Sección tipo 'hero' en forma de rectángulo con esquinas redondeadas -->
    <div class="bg-gradient-to-r from-indigo-500 to-purple-700 text-white rounded-xl p-8 text-center mb-8">
        <h2 class="text-3xl font-bold">Elige tu plan</h2>
        <p class="mt-2 text-white">
            Elige tu plan según tus exigencias y necesidades en nuestro gimnasio
        </p>
    </div>

    <!-- Opciones de pago y descuento -->
    <div class="flex flex-col md:flex-row justify-center items-center gap-4 mb-8">
        <!-- Radios de pago mensual / anual -->
        <div class="flex items-center space-x-2">
            <input type="radio" id="pago-mensual" name="pago" class="h-4 w-4" checked>
            <label for="pago-mensual" class="text-gray-700">Pago mensual</label>
        </div>
        <div class="flex items-center space-x-2">
            <input type="radio" id="pago-anual" name="pago" class="h-4 w-4">
            <label for="pago-anual" class="text-gray-700">Pago anual</label>
        </div>
        <!-- Botón de descuento -->
        <button class="bg-yellow-400 text-white px-4 py-2 rounded font-semibold hover:bg-yellow-500 transition-colors">
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
</div>
@endsection
