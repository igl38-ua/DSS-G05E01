<?php
// Aquí iría tu lógica PHP (si la necesitas), por ejemplo cargar horarios de BD.
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Release Roadmap Mejorado</title>
  <style>
    /* Reset básico */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f6f7f9; /* Fondo global suave */
      margin: 20px;
    }

    h1 {
      margin-bottom: 20px;
      font-size: 24px;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
    }

    /* =========================
       ESTILOS DE LA TABLA
       ========================= */
    table {
      width: 100%;
      border-collapse: separate;  /* Para permitir espacio entre celdas */
      border-spacing: 0px;        /* Luego lo ajustaremos con ?cell? y ?row? gaps */
      background-color: #fff;     /* Fondo de la tabla */
      box-shadow: 0 2px 5px rgba(0,0,0,0.1); /* Sombra suave */
      position: relative;
      overflow: hidden;
    }

    /* Encabezados superiores (Mañana, Medio Día, etc.) */
    thead tr.time-grouping th {
      background-color: #e9ecef;
      font-weight: normal;
      text-transform: uppercase;
      letter-spacing: 1px;
      font-size: 13px;
    }

    /* Encabezados con las horas específicas */
    thead tr.hours th {
      background-color: #f8f9fa;
      font-size: 12px;
      font-weight: normal;
      color: #666;
    }

    /* Ajuste de ancho para columnas (para ver las líneas verticales) */
    thead th, tbody td {
      width: 80px; /* Ajusta según el espacio que desees */
      text-align: center;
      padding: 8px;
      position: relative;
    }

    /* =========================
       LÍNEAS VERTICALES
       ========================= */
    /* Ponemos un borde a la derecha de cada columna para simular la línea */
    thead th, tbody td {
      border-right: 1px solid #dee2e6; 
    }

    /* Quitamos el borde a la última columna para que no se duplique */
    thead th:last-child, tbody td:last-child {
      border-right: none;
    }

    /* Línea horizontal en cada fila */
    tbody tr {
      border-bottom: 1px solid #dee2e6;
    }

    /* Quitamos el borde a la última fila */
    tbody tr:last-child {
      border-bottom: none;
    }

    /* =========================
       CABECERA IZQUIERDA (NOMBRE CLASE)
       ========================= */
    /* La primera celda de cada fila (nombre de la actividad) */
    tbody td:first-child {
      font-weight: bold;
      background-color: #f2f2f2;
      border-right: 2px solid #ccc; /* Un poco más grueso para separar ?Clases? del resto */
      width: 120px; /* Un poco más ancho para que quepa el texto */
    }

    /* =========================
       BLOQUES DE ACTIVIDAD
       ========================= */
    /* Clase genérica para todos los bloques (ajusta altura, bordes, etc.) */
    .block {
      display: inline-block;   /* Para que se ajuste al contenido */
      width: 100%;            /* O un valor fijo si prefieres */
      height: 25px;           /* Alto de los bloques */
      border-radius: 6px;     /* Bordes redondeados */
      color: #fff;            /* Texto en blanco por defecto */
      line-height: 30px;      /* Centrar verticalmente el texto */
      text-align: center;
      font-size: 14px;
      margin: 4px 0;          /* Espacio vertical entre bloques */
    }

    /* Ejemplos de colores para cada actividad */
    .zumba {
      background-color: rgb(233, 225, 2);
      color: #000;
    }
    .musculacion {
      background-color: #f44336;
    }
    .cardio {
      background-color: #4caf50;
    }
    .johnny-sins {
      background-color: #2196f3;
    }
    .jordi-enp {
      background-color: #9c27b0;
    }
    .lana-rhoades {
      background-color: #e91e63;
    }
    .jason-luv {
      background-color: #009688;
    }
    .rocco-siffredi {
      background-color: #607d8b;
    }
  </style>
</head>
<body>
<div class="container">
  <h1>Release Roadmap</h1>
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