{{-- resources/views/jam.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-gray-100">
    <!-- Título -->
    <h1 class="text-4xl font-extrabold text-center mb-6 text-teal-800">
        Lista JAM Gimnasio
    </h1>

    <!-- Barra de fecha y playlist -->
    <div class="flex justify-between items-center mb-6">
        <p class="text-gray-700 font-medium">Fecha: 18-03-2025</p>
        <p class="text-gray-700 font-semibold">PlayList</p>
    </div>

    <!-- Tabla con scroll horizontal si es necesario -->
    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-400">
            <!-- Encabezado de la tabla -->
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="border border-gray-400 p-2 text-left font-semibold">Cancion</th>
                    <th class="border border-gray-400 p-2 text-left font-semibold">Sala</th>
                    <th class="border border-gray-400 p-2 text-left font-semibold">Usuario</th>
                    <th class="border border-gray-400 p-2 text-left font-semibold">Duracion</th>
                    <th class="border border-gray-400 p-2 text-left font-semibold">Status</th>
                    <th class="border border-gray-400 p-2 text-left font-semibold">Notas</th>
                </tr>
            </thead>
            
            <!-- Cuerpo de la tabla -->
            <tbody class="bg-white">
                <!-- Fila 1 -->
                <tr class="hover:bg-gray-50 transition">
                    <td class="border border-gray-400 p-2">Otra noche en Miami</td>
                    <td class="border border-gray-400 p-2">Musculacion</td>
                    <td class="border border-gray-400 p-2">Levan</td>
                    <td class="border border-gray-400 p-2">1:00</td>
                    <td class="border border-gray-400 p-2">
                        <!-- In Progress en verde (mas intenso) -->
                        <span class="block w-full h-6 bg-yellow-300 text-black text-center rounded">
                            In Progress
                        </span>
                    </td>
                    <td class="border border-gray-400 p-2">
                        Una cancion para cuando se te rompe el cora
                    </td>
                </tr>

                <!-- Fila 2 -->
                <tr class="hover:bg-gray-50 transition">
                    <td class="border border-gray-400 p-2">Cannabis</td>
                    <td class="border border-gray-400 p-2">Zumba</td>
                    <td class="border border-gray-400 p-2">Ivan</td>
                    <td class="border border-gray-400 p-2">4:25</td>
                    <td class="border border-gray-400 p-2">
                        <span class="block w-full h-6 bg-yellow-300 text-black text-center rounded">
                            In Progress
                        </span>
                    </td>
                    <td class="border border-gray-400 p-2">Locuraaa</td>
                </tr>

                <!-- Fila 3 -->
                <tr class="hover:bg-gray-50 transition">
                    <td class="border border-gray-400 p-2">Call me maybe</td>
                    <td class="border border-gray-400 p-2">Cardio</td>
                    <td class="border border-gray-400 p-2">Esteban</td>
                    <td class="border border-gray-400 p-2">3:15</td>
                    <td class="border border-gray-400 p-2">
                        <span class="block w-full h-6 bg-red-500 text-white text-center rounded">
                            Not Started
                        </span>
                    </td>
                    <td class="border border-gray-400 p-2"></td>
                </tr>

                <!-- Fila 4 -->
                <tr class="hover:bg-gray-50 transition">
                    <td class="border border-gray-400 p-2">Una noche mas</td>
                    <td class="border border-gray-400 p-2">Zumba</td>
                    <td class="border border-gray-400 p-2">Levan</td>
                    <td class="border border-gray-400 p-2">3:34</td>
                    <td class="border border-gray-400 p-2">
                        <span class="block w-full h-6 bg-red-500 text-white text-center rounded">
                            Not Started
                        </span>
                    </td>
                    <td class="border border-gray-400 p-2"></td>
                </tr>

                <!-- Fila 5 -->
                <tr class="hover:bg-gray-50 transition">
                    <td class="border border-gray-400 p-2">Toxiccha</td>
                    <td class="border border-gray-400 p-2">Cardio</td>
                    <td class="border border-gray-400 p-2">Juan Carlos</td>
                    <td class="border border-gray-400 p-2">3:23</td>
                    <td class="border border-gray-400 p-2">
                        <span class="block w-full h-6 bg-yellow-300 text-black text-center rounded">
                            In Progress
                        </span>
                    </td>
                    <td class="border border-gray-400 p-2"></td>
                </tr>

                <!-- Fila 6 -->
                <tr class="hover:bg-gray-50 transition">
                    <td class="border border-gray-400 p-2">Holding out for a hero</td>
                    <td class="border border-gray-400 p-2">Musculacion</td>
                    <td class="border border-gray-400 p-2">Esteban</td>
                    <td class="border border-gray-400 p-2">4:44</td>
                    <td class="border border-gray-400 p-2">
                        <span class="block w-full h-6 bg-red-500 text-white text-center rounded">
                            Not Started
                        </span>
                    </td>
                    <td class="border border-gray-400 p-2">I need a hero</td>
                </tr>

                <!-- Fila 7 -->
                <tr class="hover:bg-gray-50 transition">
                    <td class="border border-gray-400 p-2">Run it Up</td>
                    <td class="border border-gray-400 p-2">Cardio</td>
                    <td class="border border-gray-400 p-2">Esteban</td>
                    <td class="border border-gray-400 p-2">2:56</td>
                    <td class="border border-gray-400 p-2">
                        <span class="block w-full h-6 bg-red-500 text-white text-center rounded">
                            Not started
                        </span>
                    </td>
                    <td class="border border-gray-400 p-2"></td>
                </tr>

                <!-- Fila 8 -->
                <tr class="hover:bg-gray-50 transition">
                    <td class="border border-gray-400 p-2">Exotica</td>
                    <td class="border border-gray-400 p-2">Zumba</td>
                    <td class="border border-gray-400 p-2">Juan Carlos</td>
                    <td class="border border-gray-400 p-2">3:18</td>
                    <td class="border border-gray-400 p-2">
                        <span class="block w-full h-6 bg-red-500 text-white text-center rounded">
                            Not Started
                        </span>
                    </td>
                    <td class="border border-gray-400 p-2"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
