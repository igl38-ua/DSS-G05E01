@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <section class="bg-gradient-to-r from-indigo-500 to-purple-700 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-4">Contáctanos</h2>
            <p class="text-xl max-w-2xl mx-auto">Estamos aquí para ayudarte en tu viaje fitness. ¡Envíanos un mensaje o visítanos hoy mismo!</p>
        </div>
    </section>

    {{-- Formulario e información de contacto --}}
    <main class="container mx-auto px-4 py-12">
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 mb-6 rounded-lg shadow-md">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            {{-- Formulario --}}
            <div class="bg-white rounded-lg shadow-lg transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                @include('contacto.formulario')
            </div>

            {{-- Info de contacto --}}
            <div class="space-y-8">
                
                @include('contacto.info')
                
                @include('contacto.ubicacion')
                
                <div class="bg-white rounded-lg shadow-lg transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    @include('contacto.redes')
                </div>
            </div>
        </div>
    </main>

    {{-- Preguntas Frecuentes --}}
    <section class="container mx-auto px-4 pb-12 space-y-8">
        <div class="bg-white rounded-lg shadow-lg transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
            @include('contacto.faq')
        </div>
        <div class="bg-white rounded-lg shadow-lg transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
            @include('contacto.pregunta')
        </div>
    </section>
@endsection
