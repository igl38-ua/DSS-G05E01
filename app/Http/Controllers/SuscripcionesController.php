<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuscripcionesController extends Controller
{
    public function index() {
        return view('suscripciones');
    }
}
