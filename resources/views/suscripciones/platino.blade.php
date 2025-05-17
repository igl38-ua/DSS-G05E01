{{-- resources/views/promociones/platino.blade.php --}}
<div class="border-2 border-gray-300 bg-gray-50 w-72 p-6 rounded-xl shadow text-center transform transition duration-300 ease-in-out  hover:-translate-y-2 hover:shadow-2xl">
    <!-- Nombre del plan -->
    <h5 class="uppercase text-sm font-bold text-gray-600 tracking-wider">PLATINO</h5>

    <!-- Precio reactivo -->
    <p 
        class="text-4xl font-extrabold text-gray-900 mt-4"
        x-text="
        payment === 'monthly'
            ? `${prices.platino.toFixed(2)} €/mes`
            : `${(prices.platino * 12 * (1 - discount)).toFixed(2)} €/año`
        "
    ></p>

    <!-- Precio mensual equivalente -->
    <p
        class="text-xl text-gray-600 mt-1"
        x-show="payment === 'annual'"
        x-text="`${(prices.platino * (1 - discount)).toFixed(2)} €/mes`"
    ></p>

    <!-- Descripción / Beneficios -->
    <p class="text-gray-700 mt-4">
        Entradas ilimitadas<br>
        Descuento de un 50% en entrenadores personales<br>
        Dieta incluida en la suscripción<br>
        Reservas antes de tiempo
    </p>
    
    @php($url = route('payment.summary', 'platino'))
    <!-- Botón de acción -->
     <a x-bind:href="`${ '{{ $url }}' }?period=${payment}`">
        <button class="mt-6 px-4 py-2 border border-gray-800 text-gray-800 rounded hover:bg-gray-100 transition-colors">Elige este plan</button>
    </a>  
</div>
