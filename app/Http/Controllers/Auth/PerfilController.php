<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class PerfilController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('perfil', compact('user'));
    }
}
