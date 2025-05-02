{{-- resources/views/contacto.blade.php --}}
@extends('layouts.app')

@section('head')
    {{-- Incluye aquí los estilos y scripts necesarios si tu layout los soporta --}}
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        }
        .contact-card {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
        .input-focus:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }
        .map-container {
            height: 100%;
            min-height: 300px;
            border-radius: 0.5rem;
            overflow: hidden;
        }
        .faq-card {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .faq-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection

@section('content')
    {{-- Hero Section --}}
    <section class="bg-gradient-to-r from-blue-900 to-blue-500 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-4">Contáctanos</h2>
            <p class="text-xl max-w-2xl mx-auto">Estamos aquí para ayudarte en tu viaje fitness. ¡Envíanos un mensaje o visítanos hoy mismo!</p>
        </div>
    </section>

    {{-- Formulario y tarjetas de contacto --}}
    <main class="container mx-auto px-4 py-12">
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 mb-6 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            {{-- Formulario --}}
            @include('contacto.formulario')

            {{-- Info de contacto --}}
            <div class="space-y-8">
                @include('contacto.info')
                @include('contacto.ubicacion')
                @include('contacto.redes')
            </div>
        </div>
    </main>

    {{-- Preguntas Frecuentes --}}
    @include('contacto.faq')
    @include('contacto.pregunta')
@endsection
