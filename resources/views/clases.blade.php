@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Horario de clases</title>
  <link href="{{ asset('css/clases.css') }}" rel="stylesheet">
  @vite('resources/css/clases.css')
</head>
<body>

<div class="container">
  <table>
    <thead>
      <!-- Agrupación de bloques -->
      <tr class="time-grouping">
        <th rowspan="2">Clases</th>
        <th colspan="4">Mañana</th>
        <th colspan="2">Medio Día</th>
        <th colspan="4">Tarde</th>
        <th colspan="3">Noche</th>
      </tr>
      <!-- Horas -->
      <tr class="hours">
        <th>8:00</th>
        <th>9:00</th>
        <th>10:00</th>
        <th>11:00</th>
        <th>12:00</th>
        <th>13:00</th>
        <th>14:00</th>
        <th>15:00</th>
        <th>16:00</th>
        <th>17:00</th>
        <th>18:00</th>
        <th>19:00</th>
        <th>20:00</th>
      </tr>
    </thead>
    <tbody>
      <!-- ZUMBA -->
      <tr>
        <td><br><br><br><div class="block zumba">Zumba</div></td>
        <td><div class="block zumba"></div></td>
        <td><div class="block zumba"></div></td>
        <td><div class="block zumba"></div></td>
        <td></td>
        <td><div class="block zumba"></div></td>
        <td></td>
        <td colspan="2"><div class="block zumba">MI RESERVA</div></td>
        <td></td>
        <td><div class="block zumba"></div></td>
        <td><div class="block zumba"></div></td>
        <td></td>
        <td><div class="block zumba"></div></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><div class="block zumba"></div></td>
        <td colspan="2"><div class="block zumba"></div></td>
        <td colspan="3"><div class="block zumba"></div></td>
        <td></td>
        <td colspan="2"><div class="block zumba"></div></td>
        <td><div class="block zumba"></div></td>
      </tr>
      
      <!-- MUSCULACIÓN -->
      <tr>
        <td><br><br><br><div class="block musculacion">Musculación</div></td>
        <td><div class="block musculacion"></div></td>
        <td><div class="block musculacion"></div></td>
        <td><div class="block musculacion"></div></td>
        <td></td>
        <td><div class="block musculacion"></div></td>
        <td></td>
        <td colspan="2"><div class="block musculacion">MI RESERVA</div></td>
        <td></td>
        <td><div class="block musculacion"></div></td>
        <td><div class="block musculacion"></div></td>
        <td></td>
        <td><div class="block musculacion"></div></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><div class="block musculacion"></div></td>
        <td colspan="2"><div class="block musculacion"></div></td>
        <td colspan="3"><div class="block musculacion"></div></td>
        <td></td>
        <td colspan="2"><div class="block musculacion"></div></td>
        <td><div class="block musculacion"></div></td>
      </tr>
      
      <!-- CARDIO -->
      <tr>
        <td><br><br><br><div class="block cardio">Cardio</div></td>
        <td><div class="block cardio"></div></td>
        <td><div class="block cardio"></div></td>
        <td><div class="block cardio"></div></td>
        <td></td>
        <td><div class="block cardio"></div></td>
        <td></td>
        <td colspan="2"><div class="block cardio">MI RESERVA</div></td>
        <td></td>
        <td><div class="block cardio"></div></td>
        <td><div class="block cardio"></div></td>
        <td></td>
        <td><div class="block cardio"></div></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><div class="block cardio"></div></td>
        <td colspan="2"><div class="block cardio"></div></td>
        <td colspan="3"><div class="block cardio"></div></td>
        <td></td>
        <td colspan="2"><div class="block cardio"></div></td>
        <td><div class="block cardio"></div></td>
      </tr>
      
      <!-- JOHNNY SINS -->
      <tr>
        <td><br><br><br><div class="block johnny-sins">Johnny Sins</div></td>
        <td><div class="block johnny-sins"></div></td>
        <td><div class="block johnny-sins"></div></td>
        <td><div class="block johnny-sins"></div></td>
        <td></td>
        <td><div class="block johnny-sins"></div></td>
        <td></td>
        <td colspan="2"><div class="block johnny-sins">MI RESERVA</div></td>
        <td></td>
        <td><div class="block johnny-sins"></div></td>
        <td><div class="block johnny-sins"></div></td>
        <td></td>
        <td><div class="block johnny-sins"></div></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><div class="block johnny-sins"></div></td>
        <td colspan="2"><div class="block johnny-sins"></div></td>
        <td colspan="3"><div class="block johnny-sins"></div></td>
        <td></td>
        <td colspan="2"><div class="block johnny-sins"></div></td>
        <td><div class="block johnny-sins"></div></td>
      </tr>
      
      <!-- JORDI ENP -->
      <tr>
        <td><br><br><br><div class="block jordi-enp">Jordi ENP</div></td>
        <td><div class="block jordi-enp"></div></td>
        <td><div class="block jordi-enp"></div></td>
        <td><div class="block jordi-enp"></div></td>
        <td></td>
        <td><div class="block jordi-enp"></div></td>
        <td></td>
        <td colspan="2"><div class="block jordi-enp">MI RESERVA</div></td>
        <td></td>
        <td><div class="block jordi-enp"></div></td>
        <td><div class="block jordi-enp"></div></td>
        <td></td>
        <td><div class="block jordi-enp"></div></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><div class="block jordi-enp"></div></td>
        <td colspan="2"><div class="block jordi-enp"></div></td>
        <td colspan="3"><div class="block jordi-enp"></div></td>
        <td></td>
        <td colspan="2"><div class="block jordi-enp"></div></td>
        <td><div class="block jordi-enp"></div></td>
      </tr>
      
      <!-- LANA RHOADES -->
      <tr>
        <td><br><br><br><div class="block lana-rhoades">Lana Rhoades</div></td>
        <td><div class="block lana-rhoades"></div></td>
        <td><div class="block lana-rhoades"></div></td>
        <td><div class="block lana-rhoades"></div></td>
        <td></td>
        <td><div class="block lana-rhoades"></div></td>
        <td></td>
        <td colspan="2"><div class="block lana-rhoades">MI RESERVA</div></td>
        <td></td>
        <td><div class="block lana-rhoades"></div></td>
        <td><div class="block lana-rhoades"></div></td>
        <td></td>
        <td><div class="block lana-rhoades"></div></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><div class="block lana-rhoades"></div></td>
        <td colspan="2"><div class="block lana-rhoades"></div></td>
        <td colspan="3"><div class="block lana-rhoades"></div></td>
        <td></td>
        <td colspan="2"><div class="block lana-rhoades"></div></td>
        <td><div class="block lana-rhoades"></div></td>
      </tr>
      
      <!-- JASON LUV -->
      <tr>
        <td><br><br><br><div class="block jason-luv">Jason Luv</div></td>
        <td><div class="block jason-luv"></div></td>
        <td><div class="block jason-luv"></div></td>
        <td><div class="block jason-luv"></div></td>
        <td></td>
        <td><div class="block jason-luv"></div></td>
        <td></td>
        <td colspan="2"><div class="block jason-luv">MI RESERVA</div></td>
        <td></td>
        <td><div class="block jason-luv"></div></td>
        <td><div class="block jason-luv"></div></td>
        <td></td>
        <td><div class="block jason-luv"></div></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><div class="block jason-luv"></div></td>
        <td colspan="2"><div class="block jason-luv"></div></td>
        <td colspan="3"><div class="block jason-luv"></div></td>
        <td></td>
        <td colspan="2"><div class="block jason-luv"></div></td>
        <td><div class="block jason-luv"></div></td>
      </tr>
      
      <!-- ROCCO SIFFREDI -->
      <tr>
        <td><br><br><br><div class="block rocco-siffredi">Rocco Siffredi</div></td>
        <td><div class="block rocco-siffredi"></div></td>
        <td><div class="block rocco-siffredi"></div></td>
        <td><div class="block rocco-siffredi"></div></td>
        <td></td>
        <td><div class="block rocco-siffredi"></div></td>
        <td></td>
        <td colspan="2"><div class="block rocco-siffredi">MI RESERVA</div></td>
        <td></td>
        <td><div class="block rocco-siffredi"></div></td>
        <td><div class="block rocco-siffredi"></div></td>
        <td></td>
        <td><div class="block rocco-siffredi"></div></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><div class="block rocco-siffredi"></div></td>
        <td colspan="2"><div class="block rocco-siffredi"></div></td>
        <td colspan="3"><div class="block rocco-siffredi"></div></td>
        <td></td>
        <td colspan="2"><div class="block rocco-siffredi"></div></td>
        <td><div class="block rocco-siffredi"></div></td>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>
@endsection