@extends('layouts.app')

@section('content')
<div class="flex-grow px-20 py-20">
  <div class="container mx-auto px-4 py-8 space-y-8">

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

    {{-- Top 5 Hilos --}}
    @if($topThreads->isNotEmpty())
      <section>
        <h2 class="text-xl font-semibold mb-4">
          🏆 Top 5 en “{{ $category->name }}”
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
          @foreach($topThreads as $thread)
            <a href="{{ route('foro.threads.show', $thread) }}"
               class="block bg-white p-4 rounded-lg shadow hover:shadow-md transition">
              <h3 class="font-medium text-gray-800 truncate">
                {{ $thread->title }}
              </h3>
              <p class="text-xs text-gray-500 mt-1">
                por <strong>{{ optional($thread->author)->nombre ?? 'Anónimo' }}</strong>
              </p>
              <div class="flex items-center mt-3 text-gray-600 space-x-3 text-sm">
                <span class="flex items-center space-x-1">
                  <img src="{{ asset('images/Icono_Like.png') }}" class="h-4 w-4" alt="Likes">
                  <span>{{ $thread->likes_count }}</span>
                </span>
                <span class="flex items-center space-x-1">
                  <img src="{{ asset('images/Icono_Dislike.png') }}" class="h-4 w-4" alt="Dislikes">
                  <span>{{ $thread->dislikes_count }}</span>
                </span>
              </div>
            </a>
          @endforeach
        </div>
      </section>
    @endif

    {{-- Lista completa paginada --}}
    <section class="space-y-6">
      <h2 class="text-xl font-semibold">Todos los hilos</h2>

      @foreach($allThreads as $thread)
        <div class="bg-white rounded shadow p-4 flex justify-between items-center">
          {{-- Título y autor --}}
          <div>
            <a href="{{ route('foro.threads.show', $thread) }}"
               class="text-lg font-semibold text-gray-800 hover:underline">
              {{ $thread->title }}
            </a>
            <p class="text-sm text-gray-500 mt-1">
              por <strong>{{ optional($thread->author)->nombre ?? 'Anónimo' }}</strong>
              • {{ $thread->created_at->diffForHumans() }}
            </p>
          </div>

          {{-- Botones Like / Dislike --}}
          <div class="flex items-center space-x-4">
            <form action="{{ route('foro.threads.like', $thread) }}" method="POST">
              @csrf
              <button type="submit"
                      class="flex items-center space-x-1 hover:text-green-600 transition">
                <img src="{{ asset('images/Icono_Like.png') }}"
                     alt="Like" class="h-4 w-4">
                <span class="text-sm">{{ $thread->likes_count }}</span>
              </button>
            </form>

            <form action="{{ route('foro.threads.dislike', $thread) }}" method="POST">
              @csrf
              <button type="submit"
                      class="flex items-center space-x-1 hover:text-red-600 transition">
                <img src="{{ asset('images/Icono_Dislike.png') }}"
                     alt="Dislike" class="h-4 w-4">
                <span class="text-sm">{{ $thread->dislikes_count }}</span>
              </button>
            </form>
          </div>
        </div>
      @endforeach
    </section>

    {{-- Paginación Semantic-UI --}}
    <div class="mt-8">
      {!! $allThreads->links('vendor.pagination.semantic-ui') !!}
    </div>

  </div>
</div>
@endsection
