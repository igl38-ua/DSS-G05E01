{{-- resources/views/spotify/callback.blade.php --}}
@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Spotify Callback</title>
</head>
<body>
    <h1>Información del usuario en Spotify</h1>

    @if(isset($userInfo))
        <p><strong>Display Name:</strong> {{ $userInfo->display_name ?? 'Desconocido' }}</p>
        <p><strong>Email:</strong> {{ $userInfo->email ?? 'No disponible' }}</p>
        <p><strong>Spotify ID:</strong> {{ $userInfo->id ?? 'No disponible' }}</p>
        <!-- Agrega aquí más campos si los necesitas, dependiendo de lo que devuelva $api->me() -->
    @else
        <p>No se recibió información del usuario.</p>
    @endif

</body>
</html>
@endsection