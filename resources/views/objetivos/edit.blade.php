@extends('layouts.app')

@section('content')
@php
    $completedClasses = Auth::user()->reservasThisMonth()->count();
    $target = Auth::user()->objetivoMes->target ?? 0;
    $progressPercentage = $target > 0 ? min(100, round($completedClasses/$target*100)) : 0;
@endphp
<div class="flex min-h-screen bg-gray-100">
  <div class="max-w-lg w-full mx-auto mt-12 px-4">
    <div class="bg-white shadow-lg rounded-2xl overflow-hidden hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
      {{-- Header --}}
      <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-5">
        <h1 class="text-white text-2xl font-bold">Editar objetivo del mes</h1>
      </div>

      {{-- Cuerpo --}}
      <div class="p-8">
        {{-- Estado actual --}}
        <p class="text-gray-700 mb-4 text-lg">
          Objetivo actual:
          <span class="font-semibold">
            {{ Auth::user()->objetivoMes->target ?? 0 }} clases
          </span>
        </p>

        {{-- Progreso --}}
        <div class="w-full bg-gray-200 h-3 rounded-full mb-4 overflow-hidden">
          <div
            class="h-full bg-indigo-500 transition-all duration-500"
            style="width: {{ $progressPercentage }}%;"
          ></div>
        </div>
        <p class="text-gray-500 mb-6">
          {{ $progressPercentage }}% completado ({{ $completedClasses }} de {{ Auth::user()->objetivoMes->target ?? 0 }} clases)
        </p>

        {{-- Formulario --}}
        <form action="{{ route('objetivo.update') }}" method="POST" class="space-y-6">
          @csrf
          @method('PUT')

          <div>
            <label for="target" class="block text-sm font-medium text-gray-700 mb-1">
              Clases objetivo
            </label>
            <input
              type="number"
              name="target"
              id="target"
              min="0"
              value="{{ old('target', Auth::user()->objetivoMes->target ?? '') }}"
              placeholder="Introduce número de clases"
              class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 py-2 px-3"
            >
            @error('target')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div class="flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="text-gray-600 hover:underline">
              &larr; Volver al tablero
            </a>
            <button
              type="submit"
              class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md transition"
            >
              Guardar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
