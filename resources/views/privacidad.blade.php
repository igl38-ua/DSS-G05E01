@extends('layouts.app') {{-- o tu layout por defecto --}}

@section('title', 'Política de Privacidad • SmartFit')

@section('content')
<main class="mx-auto max-w-3xl px-6 py-12 text-gray-800 leading-relaxed">
    <h1 class="text-3xl font-semibold mb-6 text-center">Política de Privacidad</h1>

    <p class="mb-4">En <strong>SmartFit</strong> nos comprometemos a proteger tu información personal y a
        tratarla con total transparencia y seguridad. A continuación describimos qué datos recopilamos,
        por qué lo hacemos y cuáles son tus derechos.</p>

    <!-- 1. Responsable -->
    <h2 class="text-xl font-semibold mt-8 mb-2">1. Responsable del tratamiento</h2>
    <p>SmartFit SL · CIF B-12345678 · C/ Alicante 82, 03690 San Vicente del Raspeig ·
       <a href="{{ route('inicio') }}" class="text-blue-600 underline">smartfit.com</a></p>

    <!-- 2. Datos que recopilamos -->
    <h2 class="text-xl font-semibold mt-8 mb-2">2. Datos que recopilamos</h2>
    <ul class="list-disc ml-6 space-y-1">
        <li>Datos identificativos (nombre, DNI, fecha de nacimiento, foto).</li>
        <li>Datos de contacto (teléfono, e-mail, dirección).</li>
        <li>Datos de pago (IBAN o tarjeta — encriptada por nuestro proveedor).</li>
        <li>Datos de salud que nos facilitas para elaborar tu plan de entrenamiento.</li>
        <li>Registros de acceso y uso de las instalaciones (hora de entrada/salida).</li>
        <li>Imágenes de CCTV por motivos de seguridad (30 días máx.).</li>
        <li>Cookies y datos de navegación en nuestra web/app (ver <em>Política de cookies</em>).</li>
    </ul>

    <!-- 3. Finalidades -->
    <h2 class="text-xl font-semibold mt-8 mb-2">3. Finalidades y base legítima</h2>
    <ul class="list-disc ml-6 space-y-1">
        <li><strong>Gestión de la membresía</strong> · Ejecución del contrato.</li>
        <li><strong>Programas de entrenamiento personalizados</strong> · Consentimiento expreso.</li>
        <li><strong>Cobro de cuotas y facturación</strong> · Obligación legal.</li>
        <li><strong>Comunicaciones comerciales</strong> · Interés legítimo / consentimiento (puedes
            darte de baja en cualquier momento).</li>
        <li><strong>Seguridad de las instalaciones</strong> · Interés legítimo.</li>
    </ul>

    <!-- 4. Cesiones -->
    <h2 class="text-xl font-semibold mt-8 mb-2">4. Destinatarios</h2>
    <p>No cedemos tus datos a terceros salvo:</p>
    <ul class="list-disc ml-6 space-y-1">
        <li>Proveedores de servicios de pago y bancos.</li>
        <li>Compañías aseguradoras en caso de siniestro.</li>
        <li>Empresas del grupo SmartFit para fines administrativos internos.</li>
        <li>Administraciones públicas cuando exista obligación legal.</li>
    </ul>

    <!-- 5. Conservación -->
    <h2 class="text-xl font-semibold mt-8 mb-2">5. Plazo de conservación</h2>
    <p>Guardamos tus datos mientras seas socio y, una vez cancelada la membresía, durante los plazos
       previstos por la ley (máx. 5 años para datos fiscales).</p>

    <!-- 6. Derechos -->
    <h2 class="text-xl font-semibold mt-8 mb-2">6. Tus derechos</h2>
    <p>Puedes ejercer acceso, rectificación, supresión, portabilidad, limitación u oposición enviando un
       correo a <a href="{{ route('inicio') }}" class="text-blue-600 underline">@smartfit.com</a> o
       por escrito a la dirección indicada arriba. También puedes reclamar ante la AEPD
       (<a href="https://www.aepd.es" class="text-blue-600 underline" target="_blank">www.aepd.es</a>).</p>

    <!-- 7. Seguridad -->
    <h2 class="text-xl font-semibold mt-8 mb-2">7. Seguridad de la información</h2>
    <p>Aplicamos medidas técnicas y organizativas adecuadas (cifrado, control de acceso, copias de
       seguridad) para proteger tus datos frente a pérdidas, usos indebidos o accesos no autorizados.</p>

    <!-- 8. Cambios -->
    <h2 class="text-xl font-semibold mt-8 mb-2">8. Cambios en la política</h2>
    <p>Podremos actualizar esta política para reflejar cambios legales o de servicio. Publicaremos la
       versión revisada en esta misma página.</p>

    <p class="mt-10 text-sm text-gray-600">Última actualización: {{ now()->format('d/m/Y') }}</p>
</main>
@endsection
