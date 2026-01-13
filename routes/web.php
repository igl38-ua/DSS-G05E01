<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\EntrenadorController;
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
use App\Http\Controllers\ObjetivoMesController;
use App\Http\Controllers\ProgresoController;
use App\Http\Controllers\Admin\DynamicListingController;
use App\Http\Controllers\{
    ForoController,
    ThreadController,
    PostController,
    CommentController
};
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ChatbotController;

// RUTAS DE LA APP
Route::get('/', [HomeController::class, 'index'])->name('inicio');
Route::get('/suscripciones', [SuscripcionesController::class, 'index'])->name('suscripciones');
Route::get('/clases', [ClaseController::class, 'index']) ->name('clases');
Route::get('/contacto', [ContactoController::class, 'index']) ->name('contacto');
Route::get('/progreso', [ProgresoController::class, 'index'])->name('progreso');

// RUTINAS
Route::get('/playlists/{playlistId}', [YoutubeController::class, 'show'])->name('playlists.show');

// RUTAS DE CONTACTO
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::post('/contacto', [ContactoController::class, 'enviar'])->name('contacto.enviar');
Route::post('/contacto/pregunta', [ContactoController::class, 'enviarPregunta'])->name('contacto.pregunta');

// RUTAS DE INTEGRACIÓN CON SPOTIFY Y JAM
Route::get('/login/spotify', [SpotifyController::class, 'redirectToSpotify'])->name('spotify.login');
Route::get('/spotify/callback', [SpotifyController::class, 'handleSpotifyCallback'])->name('spotify.callback');
Route::get('/jam', [JamController::class, 'index'])->name('jam.index');
Route::get('/jam/search', [JamController::class, 'searchForm'])->name('jam.search.form');
Route::post('/jam/search', [JamController::class, 'search'])->name('jam.search');
Route::post('/jam/add', [JamController::class, 'store'])->name('jam.store');

Route::view('/terminos', 'terminos')->name('terminos');
Route::view('/politica-privacidad', 'privacidad')->name('privacidad');
Route::view('/ayuda', 'ayuda')->name('ayuda');

// FOROS
Route::prefix('foro')->name('foro.')->group(function () {
    /* ───────── Categorías ───────── */
    // Página principal del foro (lista de categorías)
    Route::get('/', [ForoController::class, 'index'])
         ->name('index');

    // Hilos dentro de una categoría
    Route::get('categoria/{category:slug}', [ThreadController::class, 'byCategory'])
         ->name('show');

    /* ───────── Hilos ───────── */
    // Mostrar un hilo específico (público)
    Route::get('hilo/{thread}', [ThreadController::class, 'show'])
         ->name('threads.show');

    // Rutas que requieren autenticación
    Route::middleware('auth')->group(function () {
          // Crear hilo
          Route::get('categoria/{category:slug}/hilos/create', [ThreadController::class, 'create'])
          ->name('threads.create');
          Route::post('categoria/{category:slug}/hilos', [ThreadController::class, 'store'])
          ->name('threads.store');

          // Votar hilo 
          Route::post('threads/{thread}/like', [ThreadController::class,'like'])
          ->middleware('auth')
          ->name('threads.like');

          Route::post('threads/{thread}/dislike', [ThreadController::class,'dislike'])
          ->middleware('auth')
          ->name('threads.dislike');

          /* ───────── Posts ───────── */
          Route::post('hilo/{thread}/posts', [PostController::class, 'store'])
          ->name('posts.store');
          Route::patch('posts/{post}', [PostController::class, 'update'])
          ->name('posts.update');
          Route::delete('posts/{post}', [PostController::class, 'destroy'])
          ->name('posts.destroy');

          // Votar post
          Route::post('posts/{post}/like', [PostController::class,'like'])
          ->middleware('auth')
          ->name('posts.like');

          Route::post('posts/{post}/dislike', [PostController::class,'dislike'])
          ->middleware('auth')
          ->name('posts.dislike');

          /* ───────── Comentarios ───────── */
          Route::post('posts/{post}/comments', [CommentController::class, 'store'])
          ->name('comments.store');
          Route::patch('comments/{comment}', [CommentController::class, 'update'])
          ->name('comments.update');
          Route::delete('comments/{comment}', [CommentController::class, 'destroy'])
          ->name('comments.destroy');

          // Votar comentarios
          Route::post('comments/{comment}/like',    [CommentController::class,'like'])
               ->name('comments.like');

          Route::post('comments/{comment}/dislike', [CommentController::class,'dislike'])
               ->name('comments.dislike');
    });
});

// RUTAS DE AUTENTICACION
Route::resource('login', LoginController::class);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
     ->middleware('guest')
     ->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
     ->middleware('guest')
     ->name('password.email');
Route::resource('register', RegisterController::class);
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');
    Route::get('/mi-suscripcion', [App\Http\Controllers\DashboardController::class, 'suscripcionUsuario'])->name('mi-suscripcion');
    Route::get('/mis-clases', [App\Http\Controllers\ClaseUsuarioController::class, 'index'])->name('mis-clases');

    // PEDIDOS
    Route::get('/pedido/resumen/{plan}',[OrderController::class, 'showSummary'])->name('payment.summary');
    Route::post('/pedido/resumen/{plan}',[OrderController::class, 'createOrder'])->name('payment.create');
    Route::get('/checkout/{order}',[PaymentController::class, 'showCheckout'])->name('payment.checkout');
    Route::post('/checkout/{order}',[PaymentController::class, 'processPayment'])->name('payment.process');
    Route::get('/checkout/{order}/success',[PaymentController::class, 'success'])->name('payment.success');
    Route::get('/checkout/{order}/cancel',[PaymentController::class, 'cancel'])->name('payment.cancel');

    Route::get('/suscripciones/{subscription}/cancel', [SuscripcionesController::class, 'confirmCancel'])
         ->name('suscripciones.confirm');
    Route::delete('/suscripciones/{subscription}', [SuscripcionesController::class, 'cancel'])
         ->name('suscripciones.cancel');
});

Route::get('/admin', [DashboardController::class, 'index'])
    ->middleware(['auth', 'is_admin'])
    ->name('admin.dashboard');

// OBJETIVOS
Route::put('/objetivo/mes', [ObjetivoMesController::class, 'update'])
     ->name('objetivo.update')
     ->middleware('auth');
Route::get('/objetivo/mes/editar', [ObjetivoMesController::class, 'edit'])
     ->name('objetivo.edit')
     ->middleware('auth');

// ADMINISTRACIÓN
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('/clases', App\Http\Controllers\Admin\ClaseController::class);
    Route::resource('/empleados', App\Http\Controllers\Admin\EmpleadoController::class);
    Route::resource('/usuarios', App\Http\Controllers\Admin\UsuarioController::class);
    Route::post('/reservas', [ReservaController::class, 'store'])->name('reserva.store');
    Route::resource('/dynamic', App\Http\Controllers\Admin\DynamicListingController::class)->except(['destroy']);
    Route::delete('dynamic/{entity}/{id}', [DynamicListingController::class, 'destroy'])
        ->name('dynamic.destroy');
});

// GOOGLE LOGIN
Route::get('/auth/google/redirect', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

// RESERVAS
Route::post('/reservas', [ReservaController::class, 'store'])->name('reserva.store');
Route::delete('reserva/{id}', [ReservaController::class, 'destroy'])->name('reserva.destroy');
Route::get('/entrenadores', [EntrenadorController::class, 'index'])->name('entrenadores.index');

// CHATBOT
Route::post('/chatbot/message', [ChatbotController::class, 'handle'])->name('chatbot.message');
