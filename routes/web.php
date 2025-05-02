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
use App\Http\Controllers\YoutubeController;
// RUTAS DE LA APP

Route::get('/', [HomeController::class, 'index'])->name('inicio');
Route::get('/suscripciones', [SuscripcionesController::class, 'index'])->name('suscripciones');
Route::get('/clases', [ClaseController::class, 'index']) ->name('clases');
Route::get('/contacto', [ContactoController::class, 'index']) ->name('contacto');
Route::get('/progreso', [ProgresoController::class, 'index'])->name('progreso');
Route::get('/help', [HelpController::class, 'index'])->name('help');
Route::get('/metas', [MetasController::class, 'index'])->name('metas');

// Mostrar una playlist concreta
Route::get('/playlists/{playlistId}', [YoutubeController::class, 'show'])
     ->name('playlists.show');


<<<<<<< HEAD
<<<<<<< HEAD

=======
// RUTAS DE CONTACTO
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::post('/contacto', [ContactoController::class, 'enviar'])->name('contacto.enviar');
Route::post('/contacto/pregunta', [ContactoController::class, 'enviarPregunta'])->name('contacto.pregunta');
>>>>>>> b52fb9bfe0c7b06e1ae3cede7c605a4cd5ca6b09

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
    Route::get('/mi-suscripcion', [App\Http\Controllers\DashboardController::class, 'suscripcionUsuario'])->name('mi-suscripcion');
    Route::get('/mis-clases', [App\Http\Controllers\ClaseUsuarioController::class, 'index'])->name('mis-clases');
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
<<<<<<< HEAD
=======
// Route::get('/', function () {
    //     return view('welcome');
    // });
    
    // Route::get('/', [HomeController::class, 'index'])->name('inicio');
    Route::resource('classes', ClaseController::class);
    
    Route::get('/', [HomeController::class, 'index'])->name('home');
    
    Route::get('/suscripciones', [SuscripcionesController::class, 'index'])->name('suscripciones');
    
    Route::post('/empleados', [EmpleadoController::class, 'store'])->name('empleados.store');
    
    Route::get('/clases', [ClaseController::class, 'index']) ->name('clases');
    
    Route::get('/jam', [JamController::class, 'index']) ->name('jam');
    
    Route::get('/perfil', [PerfilController::class, 'index']) ->name('perfil');
    
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('clases', ClaseController::class);
    Route::resource('empleados', EmpleadoController::class);
    
    Route::get('/dynamic', [DynamicListingController::class, 'index'])->name('dynamic.index');
    Route::delete('/dynamic/{entity}/{id}', [DynamicListingController::class, 'destroy'])->name('dynamic.destroy');

    Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');

    // Rutas para usuarios
    Route::resource('usuarios', UsuarioController::class);

    // Ruta simple de login
    Route::get('/login', function() {
        return view('auth.login'); // Asegúrate de tener esta vista
    })->name('login');

    // Corrige la ruta de actualización de usuario
    Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');

    // Sistema de autenticación completo (recomendado)
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
>>>>>>> Levan
=======

>>>>>>> b52fb9bfe0c7b06e1ae3cede7c605a4cd5ca6b09
