<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JamController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\SuscripcionesController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;

// RUTAS DE LA APP
Route::get('/', [HomeController::class, 'index'])->name('inicio');
Route::get('/suscripciones', [SuscripcionesController::class, 'index'])->name('suscripciones');
Route::get('/jam', [JamController::class, 'index']) ->name('jam');
Route::get('/perfil', [PerfilController::class, 'index']) ->name('perfil');
Route::get('/clases', [ClaseController::class, 'index']) ->name('clases');

// RUTAS DE AUTENTICACION
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
// Mostrar el formulario de solicitud de restablecimiento de contraseña
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');
// Procesar el envío del enlace de restablecimiento
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.post');


Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin');
    Route::resource('/clases', App\Http\Controllers\Admin\ClaseController::class);
    Route::resource('/empleados', App\Http\Controllers\Admin\EmpleadoController::class);
    Route::resource('/usuarios', App\Http\Controllers\Admin\UsuarioController::class);
});
