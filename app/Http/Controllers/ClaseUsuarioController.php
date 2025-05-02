<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClaseUsuarioController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Asumimos que tu modelo Usuario tiene relación reservas() y cada Reserva tiene ->clase y ->fecha
        $reservas = $user->reservas()
                         ->with(['clase', 'fecha'])
                         ->orderBy('fecha', 'desc')
                         ->get();

        return view('clasesUsuario', compact('reservas'));
    }
}
