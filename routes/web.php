<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JamController;
use App\Http\Controllers\SuscripcionesController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\SpotifyController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\PerfilController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\GoogleController;

// RUTAS DE LA APP

Route::get('/', [HomeController::class, 'index'])->name('inicio');
Route::get('/suscripciones', [SuscripcionesController::class, 'index'])->name('suscripciones');
Route::get('/clases', [ClaseController::class, 'index']) ->name('clases');
Route::get('/contacto', [ContactoController::class, 'index']) ->name('contacto');
Route::get('/progreso', [ProgresoController::class, 'index'])->name('progreso');
Route::get('/help', [HelpController::class, 'index'])->name('help');
Route::get('/metas', [MetasController::class, 'index'])->name('metas');

// RUTAS DE INTEGRACIÓN CON SPOTIFY Y JAM

Route::get('/login/spotify', [SpotifyController::class, 'redirectToSpotify'])->name('spotify.login');
Route::get('/spotify/callback', [SpotifyController::class, 'handleSpotifyCallback'])->name('spotify.callback');
Route::get('/jam', [JamController::class, 'index'])->name('jam.index');
// Formulario (o campo) para introducir el término de búsqueda
Route::get('/jam/search', [JamController::class, 'searchForm'])->name('jam.search.form');
// Procesar la búsqueda
Route::post('/jam/search', [JamController::class, 'search'])->name('jam.search');
Route::post('/jam/add', [JamController::class, 'store'])->name('jam.store');

// RUTAS DE AUTENTICACION

Route::resource('login', LoginController::class);
Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])
->name('password.request'); // Mostrar el formulario de solicitud de restablecimiento de contraseña
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])
->name('password.email'); // Procesar el envío del enlace de restablecimiento

Route::resource('register', RegisterController::class);

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');
});

Route::get('/admin', [DashboardController::class, 'index'])
    ->middleware(['auth', 'is_admin'])
    ->name('admin.dashboard');



// cambiar esto
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('/clases', App\Http\Controllers\Admin\ClaseController::class);
    Route::resource('/empleados', App\Http\Controllers\Admin\EmpleadoController::class);
    Route::resource('/usuarios', App\Http\Controllers\Admin\UsuarioController::class);
    Route::resource('/dynamic', App\Http\Controllers\Admin\DynamicListingController::class);
    Route::delete('dynamic/{entity}/{id}', [DynamicListingController::class, 'destroy'])
        ->name('dynamic.destroy');
});

// Rutas para Google Login
Route::get('/auth/google/redirect', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');