<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClaseUsuarioController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $reservas = $user->reservas()
                         ->with('clase')
                         ->orderBy('fecha', 'desc')
                         ->get();

        return view('clasesUsuario', compact('reservas'));
    }
}
