{{-- resources/views/clases.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-5">
  <table class="w-full border-separate bg-white shadow-lg">
    <thead>
      <tr class="time-grouping uppercase tracking-wider text-sm bg-gray-200">
        <th rowspan="2" class="p-2 border-r-2 border-gray-400">Clases</th>
        <th colspan="4" class="p-2 border-r border-gray-400">Mañana</th>
        <th colspan="2" class="p-2 border-r border-gray-400">Medio Día</th>
        <th colspan="4" class="p-2 border-r border-gray-400">Tarde</th>
        <th colspan="3" class="p-2">Noche</th>
      </tr>
      <tr class="hours text-xs text-gray-600 bg-gray-100">
        <th class="p-2 border-r border-gray-400">8:00</th>
        <th class="p-2 border-r border-gray-400">9:00</th>
        <th class="p-2 border-r border-gray-400">10:00</th>
        <th class="p-2 border-r border-gray-400">11:00</th>
        <th class="p-2 border-r border-gray-400">12:00</th>
        <th class="p-2 border-r border-gray-400">13:00</th>
        <th class="p-2 border-r border-gray-400">14:00</th>
        <th class="p-2 border-r border-gray-400">15:00</th>
        <th class="p-2 border-r border-gray-400">16:00</th>
        <th class="p-2 border-r border-gray-400">17:00</th>
        <th class="p-2 border-r border-gray-400">18:00</th>
        <th class="p-2 border-r border-gray-400">19:00</th>
        <th class="p-2">20:00</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-300">
      <!-- ZUMBA -->
      <tr>
        <td class="p-2 bg-gray-200 font-bold border-r-2 border-gray-400">
          <div class="py-3">Zumba</div>
        </td>
        <td class="p-2"><div class="block w-full h-6 bg-yellow-300 text-black text-center rounded"></div></td>
        <td class="p-2"><div class="block w-full h-6 bg-yellow-300 text-black text-center rounded"></div></td>
        <td class="p-2"><div class="block w-full h-6 bg-yellow-300 text-black text-center rounded"></div></td>
        <td class="p-2"></td>
        <td class="p-2"><div class="block w-full h-6 bg-yellow-300 text-black text-center rounded"></div></td>
        <td class="p-2"></td>
        <td colspan="2" class="p-2">
          <div class="block w-full h-6 bg-yellow-300 text-black text-center rounded">MI RESERVA</div>
        </td>
        <td class="p-2"></td>
        <td class="p-2"><div class="block w-full h-6 bg-yellow-300 text-black text-center rounded"></div></td>
        <td class="p-2"><div class="block w-full h-6 bg-yellow-300 text-black text-center rounded"></div></td>
        <td class="p-2"></td>
        <td class="p-2"><div class="block w-full h-6 bg-yellow-300 text-black text-center rounded"></div></td>
      </tr>
      <tr>
        <td class="p-2 border-r-2 border-gray-400"></td>
        <td class="p-2"></td>
        <td class="p-2"></td>
        <td class="p-2">
          <div class="block w-full h-6 bg-yellow-300 text-black text-center rounded"></div>
        </td>
        <td colspan="2" class="p-2">
          <div class="block w-full h-6 bg-yellow-300 text-black text-center rounded"></div>
        </td>
        <td colspan="3" class="p-2">
          <div class="block w-full h-6 bg-yellow-300 text-black text-center rounded"></div>
        </td>
        <td class="p-2"></td>
        <td colspan="2" class="p-2">
          <div class="block w-full h-6 bg-yellow-300 text-black text-center rounded"></div>
        </td>
        <td class="p-2">
          <div class="block w-full h-6 bg-yellow-300 text-black text-center rounded"></div>
        </td>
      </tr>
      <!-- MUSCULACIÓN -->
      <tr>
        <td class="p-2 bg-gray-200 font-bold border-r-2 border-gray-400">
          <div class="py-3">Musculación</div>
        </td>
        <td class="p-2"><div class="block w-full h-6 bg-red-500 text-white text-center rounded"></div></td>
        <td class="p-2"><div class="block w-full h-6 bg-red-500 text-white text-center rounded"></div></td>
        <td class="p-2"><div class="block w-full h-6 bg-red-500 text-white text-center rounded"></div></td>
        <td class="p-2"></td>
        <td class="p-2"><div class="block w-full h-6 bg-red-500 text-white text-center rounded"></div></td>
        <td class="p-2"></td>
        <td colspan="2" class="p-2">
          <div class="block w-full h-6 bg-red-500 text-white text-center rounded">MI RESERVA</div>
        </td>
        <td class="p-2"></td>
        <td class="p-2"><div class="block w-full h-6 bg-red-500 text-white text-center rounded"></div></td>
        <td class="p-2"><div class="block w-full h-6 bg-red-500 text-white text-center rounded"></div></td>
        <td class="p-2"></td>
        <td class="p-2"><div class="block w-full h-6 bg-red-500 text-white text-center rounded"></div></td>
      </tr>
      <tr>
        <td class="p-2 border-r-2 border-gray-400"></td>
        <td class="p-2"></td>
        <td class="p-2"></td>
        <td class="p-2">
          <div class="block w-full h-6 bg-red-500 text-white text-center rounded"></div>
        </td>
        <td colspan="2" class="p-2">
          <div class="block w-full h-6 bg-red-500 text-white text-center rounded"></div>
        </td>
        <td colspan="3" class="p-2">
          <div class="block w-full h-6 bg-red-500 text-white text-center rounded"></div>
        </td>
        <td class="p-2"></td>
        <td colspan="2" class="p-2">
          <div class="block w-full h-6 bg-red-500 text-white text-center rounded"></div>
        </td>
        <td class="p-2">
          <div class="block w-full h-6 bg-red-500 text-white text-center rounded"></div>
        </td>
      </tr>
      <!-- CARDIO -->
      <tr>
        <td class="p-2 bg-gray-200 font-bold border-r-2 border-gray-400">
          <div class="py-3">Cardio</div>
        </td>
        <td class="p-2"><div class="block w-full h-6 bg-green-500 text-white text-center rounded"></div></td>
        <td class="p-2"><div class="block w-full h-6 bg-green-500 text-white text-center rounded"></div></td>
        <td class="p-2"><div class="block w-full h-6 bg-green-500 text-white text-center rounded"></div></td>
        <td class="p-2"></td>
        <td class="p-2"><div class="block w-full h-6 bg-green-500 text-white text-center rounded"></div></td>
        <td class="p-2"></td>
        <td colspan="2" class="p-2">
          <div class="block w-full h-6 bg-green-500 text-white text-center rounded">MI RESERVA</div>
        </td>
        <td class="p-2"></td>
        <td class="p-2"><div class="block w-full h-6 bg-green-500 text-white text-center rounded"></div></td>
        <td class="p-2"><div class="block w-full h-6 bg-green-500 text-white text-center rounded"></div></td>
        <td class="p-2"></td>
        <td class="p-2"><div class="block w-full h-6 bg-green-500 text-white text-center rounded"></div></td>
      </tr>
      <tr>
        <td class="p-2 border-r-2 border-gray-400"></td>
        <td class="p-2"></td>
        <td class="p-2"></td>
        <td class="p-2">
          <div class="block w-full h-6 bg-green-500 text-white text-center rounded"></div>
        </td>
        <td colspan="2" class="p-2">
          <div class="block w-full h-6 bg-green-500 text-white text-center rounded"></div>
        </td>
        <td colspan="3" class="p-2">
          <div class="block w-full h-6 bg-green-500 text-white text-center rounded"></div>
        </td>
        <td class="p-2"></td>
        <td colspan="2" class="p-2">
          <div class="block w-full h-6 bg-green-500 text-white text-center rounded"></div>
        </td>
        <td class="p-2">
          <div class="block w-full h-6 bg-green-500 text-white text-center rounded"></div>
        </td>
      </tr>
      <!-- JOHNNY SINS -->
      <tr>
        <td class="p-2 bg-gray-200 font-bold border-r-2 border-gray-400">
          <div class="py-3">Johnny Sins</div>
        </td>
        <td class="p-2"><div class="block w-full h-6 bg-blue-500 text-white text-center rounded"></div></td>
        <td class="p-2"><div class="block w-full h-6 bg-blue-500 text-white text-center rounded"></div></td>
        <td class="p-2"><div class="block w-full h-6 bg-blue-500 text-white text-center rounded"></div></td>
        <td class="p-2"></td>
        <td class="p-2"><div class="block w-full h-6 bg-blue-500 text-white text-center rounded"></div></td>
        <td class="p-2"></td>
        <td colspan="2" class="p-2">
          <div class="block w-full h-6 bg-blue-500 text-white text-center rounded">MI RESERVA</div>
        </td>
        <td class="p-2"></td>
        <td class="p-2"><div class="block w-full h-6 bg-blue-500 text-white text-center rounded"></div></td>
        <td class="p-2"><div class="block w-full h-6 bg-blue-500 text-white text-center rounded"></div></td>
        <td class="p-2"></td>
        <td class="p-2"><div class="block w-full h-6 bg-blue-500 text-white text-center rounded"></div></td>
      </tr>
      <tr>
        <td class="p-2 border-r-2 border-gray-400"></td>
        <td class="p-2"></td>
        <td class="p-2"></td>
        <td class="p-2">
          <div class="block w-full h-6 bg-blue-500 text-white text-center rounded"></div>
        </td>
        <td colspan="2" class="p-2">
          <div class="block w-full h-6 bg-blue-500 text-white text-center rounded"></div>
        </td>
        <td colspan="3" class="p-2">
          <div class="block w-full h-6 bg-blue-500 text-white text-center rounded"></div>
        </td>
        <td class="p-2"></td>
        <td colspan="2" class="p-2">
          <div class="block w-full h-6 bg-blue-500 text-white text-center rounded"></div>
        </td>
        <td class="p-2">
          <div class="block w-full h-6 bg-blue-500 text-white text-center rounded"></div>
        </td>
      </tr>
      <!-- JORDI ENP -->
      <tr>
        <td class="p-2 bg-gray-200 font-bold border-r-2 border-gray-400">
          <div class="py-3">Jordi ENP</div>
        </td>
        <td class="p-2"><div class="block w-full h-6 bg-purple-500 text-white text-center rounded"></div></td>
        <td class="p-2"><div class="block w-full h-6 bg-purple-500 text-white text-center rounded"></div></td>
        <td class="p-2"><div class="block w-full h-6 bg-purple-500 text-white text-center rounded"></div></td>
        <td class="p-2"></td>
        <td class="p-2"><div class="block w-full h-6 bg-purple-500 text-white text-center rounded"></div></td>
        <td class="p-2"></td>
        <td colspan="2" class="p-2">
          <div class="block w-full h-6 bg-purple-500 text-white text-center rounded">MI RESERVA</div>
        </td>
        <td class="p-2"></td>
        <td class="p-2"><div class="block w-full h-6 bg-purple-500 text-white text-center rounded"></div></td>
        <td class="p-2"><div class="block w-full h-6 bg-purple-500 text-white text-center rounded"></div></td>
        <td class="p-2"></td>
        <td class="p-2"><div class="block w-full h-6 bg-purple-500 text-white text-center rounded"></div></td>
      </tr>
      <tr>
        <td class="p-2 border-r-2 border-gray-400"></td>
        <td class="p-2"></td>
        <td class="p-2"></td>
        <td class="p-2">
          <div class="block w-full h-6 bg-purple-500 text-white text-center rounded"></div>
        </td>
        <td colspan="2" class="p-2">
          <div class="block w-full h-6 bg-purple-500 text-white text-center rounded"></div>
        </td>
        <td colspan="3" class="p-2">
          <div class="block w-full h-6 bg-purple-500 text-white text-center rounded"></div>
        </td>
        <td class="p-2"></td>
        <td colspan="2" class="p-2">
          <div class="block w-full h-6 bg-purple-500 text-white text-center rounded"></div>
        </td>
        <td class="p-2">
          <div class="block w-full h-6 bg-purple-500 text-white text-center rounded"></div>
        </td>
      </tr>
      <!-- LANA RHOADES -->
      <tr>
        <td class="p-2 bg-gray-200 font-bold border-r-2 border-gray-400">
          <div class="py-3">Lana Rhoades</div>
        </td>
        <td class="p-2"><div class="block w-full h-6 bg-pink-500 text-white text-center rounded"></div></td>
        <td class="p-2"><div class="block w-full h-6 bg-pink-500 text-white text-center rounded"></div></td>
        <td class="p-2"><div class="block w-full h-6 bg-pink-500 text-white text-center rounded"></div></td>
        <td class="p-2"></td>
        <td class="p-2"><div class="block w-full h-6 bg-pink-500 text-white text-center rounded"></div></td>
        <td class="p-2"></td>
        <td colspan="2" class="p-2">
          <div class="block w-full h-6 bg-pink-500 text-white text-center rounded">MI RESERVA</div>
        </td>
        <td class="p-2"></td>
        <td class="p-2"><div class="block w-full h-6 bg-pink-500 text-white text-center rounded"></div></td>
        <td class="p-2"><div class="block w-full h-6 bg-pink-500 text-white text-center rounded"></div></td>
        <td class="p-2"></td>
        <td class="p-2"><div class="block w-full h-6 bg-pink-500 text-white text-center rounded"></div></td>
      </tr>
      <tr>
        <td class="p-2 border-r-2 border-gray-400"></td>
        <td class="p-2"></td>
        <td class="p-2"></td>
        <td class="p-2">
          <div class="block w-full h-6 bg-pink-500 text-white text-center rounded"></div>
        </td>
        <td colspan="2" class="p-2">
          <div class="block w-full h-6 bg-pink-500 text-white text-center rounded"></div>
        </td>
        <td colspan="3" class="p-2">
          <div class="block w-full h-6 bg-pink-500 text-white text-center rounded"></div>
        </td>
        <td class="p-2"></td>
        <td colspan="2" class="p-2">
          <div class="block w-full h-6 bg-pink-500 text-white text-center rounded"></div>
        </td>
        <td class="p-2">
          <div class="block w-full h-6 bg-pink-500 text-white text-center rounded"></div>
        </td>
      </tr>
      <!-- JASON LUV -->
      <tr>
        <td class="p-2 bg-gray-200 font-bold border-r-2 border-gray-400">
          <div class="py-3">Jason Luv</div>
        </td>
        <td class="p-2"><div class="block w-full h-6 bg-teal-500 text-white text-center rounded"></div></td>
        <td class="p-2"><div class="block w-full h-6 bg-teal-500 text-white text-center rounded"></div></td>
        <td class="p-2"><div class="block w-full h-6 bg-teal-500 text-white text-center rounded"></div></td>
        <td class="p-2"></td>
        <td class="p-2"><div class="block w-full h-6 bg-teal-500 text-white text-center rounded"></div></td>
        <td class="p-2"></td>
        <td colspan="2" class="p-2">
          <div class="block w-full h-6 bg-teal-500 text-white text-center rounded">MI RESERVA</div>
        </td>
        <td class="p-2"></td>
        <td class="p-2"><div class="block w-full h-6 bg-teal-500 text-white text-center rounded"></div></td>
        <td class="p-2"><div class="block w-full h-6 bg-teal-500 text-white text-center rounded"></div></td>
        <td class="p-2"></td>
        <td class="p-2"><div class="block w-full h-6 bg-teal-500 text-white text-center rounded"></div></td>
      </tr>
      <tr>
        <td class="p-2 border-r-2 border-gray-400"></td>
        <td class="p-2"></td>
        <td class="p-2"></td>
        <td class="p-2">
          <div class="block w-full h-6 bg-teal-500 text-white text-center rounded"></div>
        </td>
        <td colspan="2" class="p-2">
          <div class="block w-full h-6 bg-teal-500 text-white text-center rounded"></div>
        </td>
        <td colspan="3" class="p-2">
          <div class="block w-full h-6 bg-teal-500 text-white text-center rounded"></div>
        </td>
        <td class="p-2"></td>
        <td colspan="2" class="p-2">
          <div class="block w-full h-6 bg-teal-500 text-white text-center rounded"></div>
        </td>
        <td class="p-2">
          <div class="block w-full h-6 bg-teal-500 text-white text-center rounded"></div>
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection
