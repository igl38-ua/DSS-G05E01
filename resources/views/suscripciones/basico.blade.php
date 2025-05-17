{{-- resources/views/promociones/basico.blade.php --}}
<div class="border-2 border-gray-300 bg-gray-50 w-72 p-6 rounded-xl shadow text-center  transform transition duration-300 ease-in-out  hover:-translate-y-2 hover:shadow-2xl">
    <!-- Nombre del plan -->
    <h5 class="uppercase text-sm font-bold text-gray-600 tracking-wider">BÁSICO</h5>
    
    <!-- Precio reactivo -->
    <p 
        class="text-4xl font-extrabold text-gray-900 mt-4"
        x-text="
        payment === 'monthly'
            ? `${prices.basico.toFixed(2)} €/mes`
            : `${(prices.basico * 12 * (1 - discount)).toFixed(2)} €/año`
        "
    ></p>

    <!-- Precio mensual equivalente (solo en anual) -->
    <p
        class="text-xl text-gray-600 mt-1"
        x-show="payment === 'annual'"
        x-text="`${(prices.basico * (1 - discount)).toFixed(2)} €/mes`"
    ></p>
    
    <!-- Descripción / Beneficios -->
    <p class="text-gray-700 mt-4">
        Pase 3 veces por semana<br>
        Posibilidad de reservar entrenadores personales
    </p>

    @php($url = route('payment.summary', 'basico'))
    <!-- Botón de acción -->
    <a x-bind:href="`${ '{{ $url }}' }?period=${payment}`">
        <button class="mt-6 px-4 py-2 border border-gray-800 text-gray-800 rounded hover:bg-gray-100 transition-colors">Elige este plan</button>
    </a>   
</div>
