<?php

namespace App\Http\Controllers;

use App\Models\Clase;

class EntrenadorController extends Controller
{
    public function index()
    {
        // Obtener TODAS las clases sin ningún filtro
        $todasLasClases = Clase::withCount('reservas')
            ->orderBy('fecha', 'desc')
            ->orderBy('horario')
            ->get();

        // Agrupar por estado para mejor organización
        $clasesAgrupadas = [
            'sin_instructor' => $todasLasClases->whereNull('instructor'),
            'completas' => $todasLasClases->filter(function($clase) {
                return isset($clase->capacidad_max) && 
                    $clase->reservas_count >= $clase->capacidad_max;
            }),
            'pasadas' => $todasLasClases->filter(function($clase) {
                return $clase->fecha && now()->gt($clase->fecha);
            })
        ];

        return view('entrenadores.index', [
            'clases' => $todasLasClases,
            'clasesAgrupadas' => $clasesAgrupadas,
            'totalClases' => $todasLasClases->count()
        ]);
    }
}