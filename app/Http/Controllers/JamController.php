<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JamController extends Controller
{
    public function index() {
        return view('jam');
    }
}
