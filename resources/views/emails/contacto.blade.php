@component('mail::message')
# Nuevo mensaje de contacto

- **Nombre:** {{ $data['nombre'] }}
- **Email:** {{ $data['email'] }}
- **Teléfono:** {{ $data['telefono'] ?: '—' }}
- **Asunto:** {{ ucfirst($data['asunto']) }}

---

{{ $data['mensaje'] }}

@endcomponent
