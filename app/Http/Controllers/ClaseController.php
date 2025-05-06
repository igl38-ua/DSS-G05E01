<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clase;
use Illuminate\Support\Facades\Auth;

class ClaseController extends Controller
{
    // En ClaseController.php (si puedes añadir código):
    public function index()
    {
        $clases = Clase::all()->groupBy('nombre'); // Agrupa por columna "nombre"
        $reservasUsuario = Auth::check() 
            ? Auth::user()->reservas()->pluck('ID_Clase')->toArray() 
            : [];
    
        return view('clases', [
            'clasesAgrupadas' => $clases, // Nombre correcto para la vista
            'reservasUsuario' => $reservasUsuario
        ]);
    }
}