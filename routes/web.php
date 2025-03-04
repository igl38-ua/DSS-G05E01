<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;


Route::get('/', function () {
    return view('welcome');
});

Route::post('/empleados', [EmpleadoController::class, 'store'])->name('empleados.store');