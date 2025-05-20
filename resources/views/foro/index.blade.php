{{-- resources/views/foro/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="flex-grow px-20 py-20">
<div class="container mx-auto px-4 py-8">
  <div class="flex flex-col lg:flex-row -mx-2">
    {{-- Panel izquierdo: categorías --}}
    <div class="w-full lg:w-2/3 px-2 space-y-4">
      @foreach($categories as $cat)
        <a href="{{ route('foro.show', $cat->slug) }}"
           class="block bg-white hover:shadow-lg rounded-lg p-4 flex items-start space-x-4">
          
          {{-- Icono según $cat->icon --}}
          <div class="text-gray-500">
            @switch($cat->icon)
              @case('user')
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A9 9 0 1118.88 6.196 9 9 0 015.12 17.804z"/>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                @break

              @case('adjustments')
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h8m-8 6h16"/>
                  <circle cx="16" cy="6" r="2" stroke="currentColor" stroke-width="2" fill="none"/>
                  <circle cx="8" cy="12" r="2" stroke="currentColor" stroke-width="2" fill="none"/>
                  <circle cx="12" cy="18" r="2" stroke="currentColor" stroke-width="2" fill="none"/>
                </svg>
                @break

              @case('book-open')
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 20h9M12 4h9M3 6h.01M3 18h.01M4 6h16v12H4V6z"/>
                </svg>
                @break

              @case('users')
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                @break

              @case('light-bulb')
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 3a7 7 0 017 7c0 2.386-1.268 4.47-3.187 5.687L14 17h-4l-.813-1.313A6.978 6.978 0 015 10a7 7 0 016-7z"/>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 21h6v-2H9v2z"/>
                </svg>
                @break

              @default
                <!-- icono por defecto (punto) -->
                <span class="inline-block h-6 w-6 bg-gray-300 rounded-full"></span>
            @endswitch
          </div>

          <div>
            <h3 class="text-lg font-semibold text-gray-800">{{ $cat->name }}</h3>
            <p class="text-sm text-gray-500">{{ $cat->description }}</p>
          </div>
        </a>
      @endforeach
    </div>
    {{-- ───────── Panel derecho: Trending ───────── --}}
    <div class="w-full lg:w-1/3 lg:pl-8 px-2 mt-8 lg:mt-0">

      <section class="bg-white rounded-2xl shadow p-6
                      h-auto max-h-[calc(100vh-6rem)] overflow-y-auto">

        <div class="flex items-center mb-4">
          <img src="{{ asset('images/Icono_Trending.png') }}" alt="Trending" class="h-5 w-5 mr-2">
          <h2 class="text-xl font-extrabold text-gray-900">Trending</h2>
        </div>

        @foreach($trending as $thread)
          <a href="{{ route('foro.threads.show', $thread) }}" class="block mb-6 last:mb-0">

            <h3 class="font-semibold text-gray-800 hover:text-purple-600">
              {{ \Illuminate\Support\Str::limit($thread->title, 60) }}
            </h3>

            <p class="text-xs text-gray-500 flex items-center space-x-1">
              <span>por {{ optional($thread->author)->nombre ?? 'Anónimo' }}</span>
              <span>·</span>
              @foreach($categories as $cat)
                @if($cat->id == $thread->category_id)
                  <span class="text-purple-600">{{ $cat->name }}</span>
                @endif
              @endforeach
            </p>

          </a>
        @endforeach
      </section>

    </div>


  </div>
</div>
</div>
@endsection
