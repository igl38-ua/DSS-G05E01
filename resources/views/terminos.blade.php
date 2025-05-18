@extends('layouts.app') {{-- o el layout que uses --}}

@section('title', 'Términos y Condiciones • SmartFit')

@section('content')
<main class="mx-auto max-w-3xl px-6 py-12 text-gray-800 leading-relaxed">
    <h1 class="text-3xl font-semibold mb-6 text-center">Términos y Condiciones</h1>

    <p class="mb-4">Bienvenido a <strong>SmartFit</strong>. Al registrarte y utilizar nuestras instalaciones
    aceptas los presentes términos y condiciones. Si no estás de acuerdo con alguno de ellos, por favor abstente de
    usar nuestros servicios.</p>

    <h2 class="text-xl font-semibold mt-8 mb-2">1. Membresía</h2>
    <ul class="list-disc ml-6 space-y-1">
        <li>La membresía es personal e intransferible.</li>
        <li>Debes presentar tu credencial o app de acceso en cada visita.</li>
        <li>Los menores de 16 años solo pueden entrenar con autorización y supervisión de un adulto.</li>
    </ul>

    <h2 class="text-xl font-semibold mt-8 mb-2">2. Pagos</h2>
    <ul class="list-disc ml-6 space-y-1">
        <li>Las cuotas se cobran mensualmente por adelantado mediante la forma de pago elegida.</li>
        <li>Si un pago es rechazado, tendrás 10&nbsp;días naturales para regularizarlo. De lo contrario, el acceso
            quedará suspendido.</li>
    </ul>

    <h2 class="text-xl font-semibold mt-8 mb-2">3. Cancelaciones y pausas</h2>
    <ul class="list-disc ml-6 space-y-1">
        <li>Puedes cancelar tu membresía en cualquier momento avisando con al menos 15&nbsp;días de antelación
            a la fecha de cobro.</li>
        <li>Las tarifas ya abonadas no son reembolsables.</li>
        <li>Ofrecemos una pausa temporal (máx. 60&nbsp;días al año) por motivos médicos acreditados.</li>
    </ul>

    <h2 class="text-xl font-semibold mt-8 mb-2">4. Salud y responsabilidad</h2>
    <ul class="list-disc ml-6 space-y-1">
        <li>Declara que estás en condiciones físicas adecuadas para realizar ejercicio. Consulta a tu médico ante
            cualquier duda.</li>
        <li>SmartFit no se hace responsable de lesiones o accidentes derivados del uso inadecuado de las
            instalaciones o del incumplimiento de estas normas.</li>
    </ul>

    <h2 class="text-xl font-semibold mt-8 mb-2">5. Uso de las instalaciones</h2>
    <ul class="list-disc ml-6 space-y-1">
        <li>Usa toalla en cada máquina y limpia el equipo después de usarlo.</li>
        <li>Devuelve el material (mancuernas, discos, colchonetas) a su lugar.</li>
        <li>Está prohibido fumar, ingerir alcohol o sustancias ilegales dentro del gimnasio.</li>
    </ul>

    <h2 class="text-xl font-semibold mt-8 mb-2">6. Horarios y modificaciones</h2>
    <ul class="list-disc ml-6 space-y-1">
        <li>El horario habitual es de lunes a viernes 6:00-23:00&nbsp;h, sábados 7:00-21:00&nbsp;h y domingos
            8:00-20:00&nbsp;h. Los días festivos pueden variar.</li>
        <li>SmartFit se reserva el derecho de modificar servicios, precios u horarios previa notificación.</li>
    </ul>

    <h2 class="text-xl font-semibold mt-8 mb-2">7. Datos personales</h2>
    <p>Los datos que nos proporciones se tratarán conforme a la legislación vigente y nuestra
        <a href="/politica-privacidad" class="text-blue-600 underline">Política de Privacidad</a>.</p>

    <p class="mt-10 text-sm text-gray-600">Última actualización: {{ now()->format('d/m/Y') }}</p>
</main>
@endsection
