@extends('layouts.app')

@section('title', 'Centro de Ayuda • SmartFit')

@section('content')
<main class="mx-auto max-w-4xl px-6 py-12 text-gray-800 leading-relaxed">
    <h1 class="text-3xl font-semibold mb-8 text-center">Centro de Ayuda</h1>


    {{-- 1. Cuenta y Membresía --}}
    <h2 id="cuenta" class="text-xl font-semibold mt-10 mb-4">Cuenta y Membresía</h2>
    <details class="mb-3">
        <summary class="cursor-pointer font-medium">¿Cómo puedo registrarme en SmartFit?</summary>
        <p class="mt-2">Puedes darte de alta en recepción o directamente en nuestra web/app.
           Solo necesitas un documento de identidad y un método de pago válido.</p>
    </details>
    <details class="mb-3">
        <summary class="cursor-pointer font-medium">¿Puedo pausar mi membresía?</summary>
        <p class="mt-2">Sí. Dispones de hasta 60 días al año por motivos médicos o laborales.
           Solicítalo desde tu cuenta o en recepción con al menos 3 días de antelación.</p>
    </details>

    {{-- 2. Pagos y Facturación --}}
    <h2 id="pagos" class="text-xl font-semibold mt-10 mb-4">Pagos y Facturación</h2>
    <details class="mb-3">
        <summary class="cursor-pointer font-medium">¿Cuándo se realiza el cobro mensual?</summary>
        <p class="mt-2">El día 1 de cada mes. Si el pago falla, se reintenta automáticamente
           durante los 10 días siguientes.</p>
    </details>
    <details class="mb-3">
        <summary class="cursor-pointer font-medium">¿Cómo cambio mi tarjeta o IBAN?</summary>
        <p class="mt-2">Desde tu perfil, sección “Métodos de pago”, o acude a recepción con tu nueva tarjeta.</p>
    </details>

    {{-- 3. Instalaciones y Equipos --}}
    <h2 id="instalaciones" class="text-xl font-semibold mt-10 mb-4">Instalaciones y Equipos</h2>
    <details class="mb-3">
        <summary class="cursor-pointer font-medium">¿Tengo que reservar para usar la sala de peso libre?</summary>
        <p class="mt-2">No. Se accede por orden de llegada. Por favor, respeta el límite de
           30 min si hay otros socios esperando.</p>
    </details>
    <details class="mb-3">
        <summary class="cursor-pointer font-medium">¿Disponen de taquillas de uso diario?</summary>
        <p class="mt-2">Sí, solo necesitas un candado. Las taquillas se vacían cada noche.</p>
    </details>

    {{-- 4. Clases y Entrenadores --}}
    <h2 id="clases" class="text-xl font-semibold mt-10 mb-4">Clases y Entrenadores</h2>
    <details class="mb-3">
        <summary class="cursor-pointer font-medium">¿Cómo reservo una clase colectiva?</summary>
        <p class="mt-2">En la app, en “Clases”, elige la sesión y pulsa “Reservar”.
           Las plazas se abren 48 h antes del inicio.</p>
    </details>
    <details class="mb-3">
        <summary class="cursor-pointer font-medium">¿Ofrecen planes de entrenamiento personalizados?</summary>
        <p class="mt-2">Sí. Nuestros entrenadores certificados elaboran rutinas adaptadas a tus objetivos;
           contrátalo en la app o consulta en recepción.</p>
    </details>

    {{-- 5. Salud y Seguridad --}}
    <h2 id="salud" class="text-xl font-semibold mt-10 mb-4">Salud y Seguridad</h2>
    <details class="mb-3">
        <summary class="cursor-pointer font-medium">¿Debo llevar certificado médico?</summary>
        <p class="mt-2">Solo recomendamos un chequeo previo si padeces alguna condición de salud.
           El certificado es obligatorio para menores de 18 años.</p>
    </details>
    <details class="mb-3">
        <summary class="cursor-pointer font-medium">¿Qué hago si me lesiono entrenando?</summary>
        <p class="mt-2">Detén tu actividad y avisa al personal. Disponemos de botiquín y protocolo
           de actuación. Te ayudaremos a contactar con emergencias si es necesario.</p>
    </details>

    {{-- Contacto --}}
    <h2 id="contacto" class="text-xl font-semibold mt-10 mb-4">¿Necesitas más ayuda?</h2>
    <p>Escríbenos a
       <a href="mailto:smartfitdsscontacto@gmail.com" class="text-blue-600 underline">smartfitdsscontacto@gmail.com
</a>,
       llámanos al <strong>965 678 882</strong> (L-V 6-22 h S 8-20 D 9-16) o pregunta directamente en recepción.</p>
</main>
@endsection
