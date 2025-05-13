@extends('layouts.app')

@section('content')
<div class="flex-grow px-20 py-20">
<div class="container mx-auto px-4 py-8 max-w-2xl">
  <h1 class="text-2xl font-bold mb-4">Crear nuevo hilo en {{ $category->name }}</h1>

  <form action="{{ route('foro.threads.store', $category) }}" method="POST" class="space-y-4">
    @csrf

    <div>
      <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
      <input type="text" name="title" id="title"
             class="mt-1 block w-full border rounded p-2"
             value="{{ old('title') }}" required>
      @error('title')
        <p class="text-red-500 text-sm">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="body" class="block text-sm font-medium text-gray-700">Mensaje inicial</label>
      <textarea name="body" id="body" rows="5"
                class="mt-1 block w-full border rounded p-2"
                required>{{ old('body') }}</textarea>
      @error('body')
        <p class="text-red-500 text-sm">{{ $message }}</p>
      @enderror
    </div>

    <div class="flex space-x-2">
      <button type="submit"
              class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">
        Publicar hilo
      </button>
      <a href="{{ route('foro.show', $category) }}"
         class="px-4 py-2 rounded border text-gray-700">Cancelar</a>
    </div>
  </form>
</div>
</div>
@endsection
