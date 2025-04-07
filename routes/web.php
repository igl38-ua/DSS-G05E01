<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JamController;
use App\Http\Controllers\SuscripcionesController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\PerfilController;

// RUTAS DE LA APP
Route::get('/', [HomeController::class, 'index'])->name('inicio');
Route::get('/suscripciones', [SuscripcionesController::class, 'index'])->name('suscripciones');
Route::get('/jam', [JamController::class, 'index']) ->name('jam');
Route::get('/perfil', [PerfilController::class, 'index']) ->name('perfil.index');
Route::get('/clases', [ClaseController::class, 'index']) ->name('clases');

// RUTAS DE AUTENTICACION

Route::resource('login', LoginController::class);
Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request'); // Mostrar el formulario de solicitud de restablecimiento de contraseña
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email'); // Procesar el envío del enlace de restablecimiento

Route::resource('register', RegisterController::class);

Route::middleware('auth')->group(function () {
    Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil.index');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin');
    Route::resource('/clases', App\Http\Controllers\Admin\ClaseController::class);
    Route::resource('/empleados', App\Http\Controllers\Admin\EmpleadoController::class);
    Route::resource('/usuarios', App\Http\Controllers\Admin\UsuarioController::class);
    Route::resource('/dynamic', App\Http\Controllers\Admin\DynamicController::class);
});
