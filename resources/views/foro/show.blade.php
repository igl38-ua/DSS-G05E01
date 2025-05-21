@extends('layouts.app')

@section('content')
<div class="flex-grow px-20 py-20">
  <div class="container mx-auto px-4 py-8 space-y-6">

    {{-- Título del hilo --}}
    <h1 class="text-2xl font-bold text-gray-800">{{ $thread->title }}</h1>

    {{-- Cuerpo del hilo --}}
    @if($thread->body)
      <article class="bg-gray-50 border border-gray-200 rounded-lg p-6 prose text-gray-800">
        {!! nl2br(e($thread->body)) !!}
      </article>
    @endif

    {{-- Formulario para nuevo mensaje --}}
    @auth
      <form action="{{ route('foro.posts.store', $thread) }}" method="POST" class="space-y-2">
        @csrf
        <textarea name="body" rows="3"
          class="w-full border rounded p-2"
          placeholder="Escribe tu mensaje…">{{ old('body') }}</textarea>
        @error('body')
          <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
        <button type="submit"
          class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">
          Publicar mensaje
        </button>
      </form>
    @else
      <p class="text-gray-600">
        <a href="{{ route('login') }}" class="underline">Inicia sesión</a> para escribir un mensaje.
      </p>
    @endauth

    {{-- Lista de posts paginados --}}
    <div class="space-y-4">
      @foreach($posts as $post)
        <div class="bg-white rounded shadow p-4">
          <div class="flex justify-between items-start">
            <div>
              <p class="text-gray-800">{{ $post->body }}</p>
              <p class="text-xs text-gray-500 mt-1">
                por <strong>{{ optional($post->author)->nombre ?? 'Anónimo' }}</strong>
                • <span class="js-timeago"
                    data-time="{{ $post->created_at->toIso8601String() }}">
                    {{ $post->created_at->diffForHumans() }}
                  </span>

              </p>
            </div>
          </div>

          {{-- Like / Dislike del post --}}
          <div class="mt-4 flex items-center space-x-6 text-gray-600">
            <form action="{{ route('foro.posts.like', $post) }}" method="POST">
              @csrf
              <button type="submit" class="flex items-center space-x-2 hover:text-green-600 transition">
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
                <span class="text-sm font-medium">{{ $post->likes()->count() }}</span>
              </button>
            </form>
            <form action="{{ route('foro.posts.dislike', $post) }}" method="POST">
              @csrf
              <button type="submit" class="flex items-center space-x-2 hover:text-red-600 transition">
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
                <span class="text-sm font-medium">-</span>
              </button>
            </form>
          </div>

          {{-- Comentarios del post --}}
          <div class="mt-4 pl-6 space-y-3">
            @foreach($post->comments as $comment)
              <div class="bg-gray-50 rounded p-3">
                <div class="flex justify-between items-start">
                  <div>
                    <p class="text-gray-700">{{ $comment->body }}</p>
                    <p class="text-xs text-gray-500 mt-0.5">
                      por <strong>{{ optional($comment->author)->nombre ?? 'Anónimo' }}</strong>
                      • <span class="js-timeago"
                          data-time="{{ $comment->created_at->toIso8601String() }}">
                          {{ $comment->created_at->diffForHumans() }}
                        </span>

                    </p>
                  </div>
                  @canany(['update','delete'], $comment)
                    <div class="space-x-2 text-gray-400">
                      @can('update', $comment)
                        <button onclick="toggleEditComment({{ $comment->id }})" class="text-xs">Editar</button>
                      @endcan
                      @can('delete', $comment)
                        <form action="{{ route('foro.comments.destroy', $comment) }}" method="POST" class="inline">
                          @csrf @method('DELETE')
                          <button class="text-xs text-red-500">Eliminar</button>
                        </form>
                      @endcan
                    </div>
                  @endcanany
                </div>

                {{-- Likes/dislikes comentario --}}
                <div class="mt-1 flex space-x-3 text-xs text-gray-600">
                  <form action="{{ route('foro.comments.like', $comment) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="flex items-center space-x-1 hover:text-green-600 transition">
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
                      <span>{{ $comment->likes()->count() }}</span>
                    </button>
                  </form>
                  <form action="{{ route('foro.comments.dislike', $comment) }}" method="POST" class="inline ml-4">
                    @csrf
                    <button type="submit" class="flex items-center space-x-1 hover:text-red-600 transition">
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
                      <span>-</span>
                    </button>
                  </form>
                </div>
              </div>

              {{-- Formulario edición inline --}}
              <form id="edit-comment-{{ $comment->id }}"
                    action="{{ route('foro.comments.update', $comment) }}"
                    method="POST"
                    class="mt-2 hidden space-y-1">
                @csrf @method('PATCH')
                <textarea name="body" rows="1" class="w-full border rounded p-1">{{ old('body', $comment->body) }}</textarea>
                <div class="flex space-x-2">
                  <button type="submit" class="text-xs bg-green-500 text-white px-2 rounded">Guardar</button>
                  <button type="button" onclick="toggleEditComment({{ $comment->id }})"
                          class="text-xs bg-gray-300 px-2 rounded">Cancelar</button>
                </div>
              </form>
            @endforeach

            {{-- Form para nuevo comentario --}}
            @auth
              <form action="{{ route('foro.comments.store', $post) }}" method="POST" class="mt-2 space-y-1">
                @csrf
                <textarea name="body" rows="1" class="w-full border rounded p-1" placeholder="Añadir comentario…"></textarea>
                @error('body')<p class="text-red-500 text-xs">{{ $message }}</p>@enderror
                <button class="text-sm bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 rounded">Comentar</button>
              </form>
            @endauth
          </div>
        </div>
      @endforeach
    </div>

    {{-- Enlaces de paginación --}}
   <div class="mt-6">
    {!! $posts->links('vendor.pagination.semantic-ui') !!}
  </div>


  </div>
</div>


@endsection
