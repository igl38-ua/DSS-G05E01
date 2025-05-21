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
              <svg
                width="16"
                height="16"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M7,22H4c-0.6,0-1-0.4-1-1v-9c0-0.6,0.4-1,1-1h3c0.6,0,1,0.4,1,1v9C8,21.6,7.6,22,7,22z"
                  fill="#000000"
                />
                <path
                  d="M21,10h-5.5l0.7-3.2C16.3,6,16,5,15.3,4.3C15,4,14.6,3.8,14.1,3.8h-0.4c-0.5,0-0.9,0.3-1.1,0.7l-3.3,6.5
                    C9.1,11.3,9,11.6,9,12v8c0,1.1,0.9,2,2,2h7.8c0.9,0,1.6-0.6,1.9-1.4l2.2-7.6c0.1-0.2,0.1-0.4,0.1-0.6v-0.4C23,11,22,10,21,10z"
                  fill="#000000"
                />
              </svg>


                <span class="flex items-center space-x-1">
                  <svg
                    width="16"
                    height="16"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M7,2H4C3.4,2,3,2.4,3,3v9c0,0.6,0.4,1,1,1h3c0.6,0,1-0.4,1-1V3C8,2.4,7.6,2,7,2z"
                      fill="#000000"
                    />
                    <path
                      d="M21,14h-5.5l0.7,3.2c0.1,0.8-0.2,1.8-0.9,2.5C15,20,14.6,20.2,14.1,20.2h-0.4c-0.5,0-0.9-0.3-1.1-0.7l-3.3-6.5
                        C9.1,12.7,9,12.4,9,12V4c0-1.1,0.9-2,2-2h7.8c0.9,0,1.6,0.6,1.9,1.4l2.2,7.6c0.1,0.2,0.1,0.4,0.1,0.6v0.4C23,13,22,14,21,14z"
                      fill="#000000"
                    />
                  </svg>
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
              <svg
                width="16"
                height="16"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M7,22H4c-0.6,0-1-0.4-1-1v-9c0-0.6,0.4-1,1-1h3c0.6,0,1,0.4,1,1v9C8,21.6,7.6,22,7,22z"
                  fill="#000000"
                />
                <path
                  d="M21,10h-5.5l0.7-3.2C16.3,6,16,5,15.3,4.3C15,4,14.6,3.8,14.1,3.8h-0.4c-0.5,0-0.9,0.3-1.1,0.7l-3.3,6.5
                    C9.1,11.3,9,11.6,9,12v8c0,1.1,0.9,2,2,2h7.8c0.9,0,1.6-0.6,1.9-1.4l2.2-7.6c0.1-0.2,0.1-0.4,0.1-0.6v-0.4C23,11,22,10,21,10z"
                  fill="#000000"
                />
              </svg>
                <span class="text-sm">{{ $thread->likes_count }}</span>
              </button>
            </form>

            <form action="{{ route('foro.threads.dislike', $thread) }}" method="POST">
              @csrf
              <button type="submit"
                      class="flex items-center space-x-1 hover:text-red-600 transition">
                <svg
                  width="16"
                  height="16"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M7,2H4C3.4,2,3,2.4,3,3v9c0,0.6,0.4,1,1,1h3c0.6,0,1-0.4,1-1V3C8,2.4,7.6,2,7,2z"
                    fill="#000000"
                  />
                  <path
                    d="M21,14h-5.5l0.7,3.2c0.1,0.8-0.2,1.8-0.9,2.5C15,20,14.6,20.2,14.1,20.2h-0.4c-0.5,0-0.9-0.3-1.1-0.7l-3.3-6.5
                      C9.1,12.7,9,12.4,9,12V4c0-1.1,0.9-2,2-2h7.8c0.9,0,1.6,0.6,1.9,1.4l2.2,7.6c0.1,0.2,0.1,0.4,0.1,0.6v0.4C23,13,22,14,21,14z"
                    fill="#000000"
                  />
                </svg>
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
