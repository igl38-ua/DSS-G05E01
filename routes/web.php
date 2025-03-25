<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JamController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\SuscripcionesController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\UsuarioController;



// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [HomeController::class, 'index'])->name('inicio');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/suscripciones', [SuscripcionesController::class, 'index'])->name('suscripciones');

Route::post('/empleados', [EmpleadoController::class, 'store'])->name('empleados.store');

Route::get('/clases', [ClaseController::class, 'index']) ->name('clases');

Route::get('/jam', [JamController::class, 'index']) ->name('jam');

Route::get('/perfil', [PerfilController::class, 'index']) ->name('perfil');

Route::resource('usuarios', UsuarioController::class);
Route::resource('clases', ClasesController::class);
Route::resource('empleados', EmpleadosController::class);