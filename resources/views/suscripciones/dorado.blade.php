{{-- resources/views/promociones/dorado.blade.php --}}
<div class="border-2 border-yellow-400 bg-yellow-50 w-72 p-6 rounded-xl shadow text-center transform transition duration-300 ease-in-out  hover:-translate-y-2 hover:shadow-2xl">
    <!-- Nombre del plan -->
    <h5 class="uppercase text-sm font-bold text-yellow-600 tracking-wider">DORADO</h5>

    <!-- Precio reactivo -->
    <p 
        class="text-4xl font-extrabold text-gray-900 mt-4"
        x-text="
        payment === 'monthly'
            ? `${prices.dorado.toFixed(2)} €/mes`
            : `${(prices.dorado * 12 * (1 - discount)).toFixed(2)} €/año`
        "
    ></p>

    <!-- Precio mensual equivalente -->
    <p
        class="text-xl text-gray-600 mt-1"
        x-show="payment === 'annual'"
        x-text="`${(prices.dorado * (1 - discount)).toFixed(2)} €/mes`"
    ></p>

    <!-- Descripción / Beneficios -->
    <p class="text-gray-700 mt-4">
        Entradas ilimitadas<br>
        Descuento de un 20% en entrenadores personales<br>
        Posibilidad de tener una dieta personalizada
    </p>

    <!-- Botón de acción -->
    <button 
        class="mt-6 px-4 py-2 border border-yellow-600 text-yellow-600 rounded hover:bg-yellow-100 transition-colors"
    >
        Elige este plan
    </button>
</div>
