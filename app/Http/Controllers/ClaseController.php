<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clase;
use Illuminate\Support\Facades\Auth;

class ClaseController extends Controller
{
    public function index()
    {
        $clases = Clase::all()->groupBy('nombre'); // Agrupa por columna "nombre"
        $reservasUsuario = Auth::check() 
            ? Auth::user()->reservas()->pluck('ID_Clase')->toArray() 
            : [];
    
        return view('clases', [
            'clasesAgrupadas' => $clases,
            'reservasUsuario' => $reservasUsuario
        ]);
    }
}