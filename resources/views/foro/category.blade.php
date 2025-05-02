{{-- resources/views/foro/category.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

  {{-- ───────── Encabezado de la categoría + botón ───────── --}}
  <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 space-y-4 sm:space-y-0">

      <div>
          <h1 class="text-3xl font-extrabold text-gray-900">{{ $category->name }}</h1>
          <p class="text-gray-600 mt-1">{{ $category->description }}</p>
      </div>

      @auth
        <a href="{{ route('foro.threads.create', $category) }}"
           class="inline-block px-6 py-2 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-lg transition">
            Nuevo hilo
        </a>
      @endauth
  </div>

  {{-- Trending local: Top cinco hilos --}}
  @if($topThreads->isNotEmpty())
    <section class="bg-white rounded-2xl shadow p-6">
      <div class="flex items-center mb-4">
        <img src="{{ asset('images/Icono_Trending.png') }}" alt="Trending" class="h-6 w-6 mr-2">
        <h2 class="text-2xl font-bold text-gray-800">
          Lo más votado en {{ $category->name }}
        </h2>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($topThreads as $thread)
          <a href="{{ route('foro.threads.show', $thread) }}"
             class="group block bg-gray-50 hover:bg-white border border-gray-200 hover:shadow-lg rounded-lg p-4 transition">
            <h3 class="text-lg font-semibold text-gray-900 group-hover:text-purple-600">
              {{ \Illuminate\Support\Str::limit($thread->title, 60) }}
            </h3>

            {{-- Contadores de votos --}}
            <div class="flex items-center mt-2 text-sm text-gray-500 space-x-4">
              <div class="flex items-center space-x-1">
                <img src="{{ asset('images/Icono_Like.png') }}" alt="Like" class="h-4 w-4">
                <span>{{ $thread->likes }}</span>      {{-- ⇐ mod --}}
              </div>
              <div class="flex items-center space-x-1">
                <img src="{{ asset('images/Icono_Dislike.png') }}" alt="Dislike" class="h-4 w-4">
                <span>{{ $thread->dislikes }}</span>   {{-- ⇐ mod --}}
              </div>
            </div>
          </a>
        @endforeach
      </div>
    </section>
  @endif

  {{-- Listado completo de hilos --}}
  <section class="space-y-4">
    @forelse($allThreads as $thread)
      <div class="bg-white hover:bg-gray-50 border border-gray-200 rounded-lg p-5 flex justify-between items-center transition">

        {{-- Enlace al hilo sólo en el bloque de texto --}}
        <div class="space-y-1 flex-1">
          <a href="{{ route('foro.threads.show', $thread) }}" class="block">
            <h4 class="text-lg font-medium text-gray-800 hover:text-purple-600">
              {{ $thread->title }}
            </h4>
          </a>
          <p class="text-xs text-gray-500">
            por {{ optional($thread->author)->name ?? 'Anónimo' }}
            · {{ $thread->created_at->diffForHumans() }}
          </p>
        </div>

        {{-- Votos --}}
        <div class="flex items-center space-x-4 text-gray-600">

          {{-- Like --}}
          <form action="{{ route('foro.threads.like', $thread) }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="flex items-center space-x-1 hover:text-green-600">
              <img src="{{ asset('images/Icono_Like.png') }}" alt="Like" class="h-4 w-4">
              <span class="text-sm">{{ $thread->likes }}</span>   {{-- ⇐ mod --}}
            </button>
          </form>

          {{-- Dislike --}}
          <form action="{{ route('foro.threads.dislike', $thread) }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="flex items-center space-x-1 hover:text-red-600">
              <img src="{{ asset('images/Icono_Dislike.png') }}" alt="Dislike" class="h-4 w-4">
              <span class="text-sm">{{ $thread->dislikes }}</span> {{-- ⇐ mod --}}
            </button>
          </form>

        </div>
      </div>

    @empty
      <p class="text-gray-500 italic">No hay hilos en esta categoría todavía.</p>
    @endforelse
  </section>

</div>
@endsection
