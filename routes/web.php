<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClaseController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('inicio');

Route::post('/empleados', [EmpleadoController::class, 'store'])->name('empleados.store');

Route::get('/clases', [ClaseController::class, 'index']) ->name('clases');
