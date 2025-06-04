<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ViajeroController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AppController::class, 'index'])->name('home');
Route::get('/login', function () {
    return view('login'); // llama a la vista de login  en auth.login 
})->name('login');
//register

Route::get('/register', function () {
    return view('register'); // llama a la vista de register  en register 
})->name('register');

//reserva
Route::get('/reserva', function () {
    return view('reserva'); // llama a la vista de reserva
})->name('reserva');

//dashboard
Route::get('/dashboard', function () {
    return view('dashboard'); // llama a la vista de dashboard
})->name('dashboard');

// Ruta comisiones
Route::get('/comisiones', function () {
    return view('comisiones'); // llama a la vista de comisiones
})->name('comisiones');

// Route::post('/crearReserva', [AuthenticatedSessionController::class, 'create'])->name('crearReserva');

Route::post('/crearReserva', [ReservaController::class, 'crearReserva'])->name('crearReserva');
Route::post('/crearViajero', [ViajeroController::class, 'crearViajero'])->name('crearViajero');

//mostrar reservas
Route::get('/mostrarPorLocalizador', [ReservaController::class, 'mostrarPorLocalizador'])->name('reservaXlocalizador');
Route::get('/mostrarReservas', [ReservaController::class, 'mostrarReservas'])->name('mostrarReservas');
Route::get('/mostrarViajeros', [ViajeroController::class, 'mostrarViajeros'])->name('mostrarViajeros');

Route::get('/home', function () {
    // Redirecciona a login si no hay sesión
    if (!session()->has('usuario')) {
        return redirect()->route('login');
    }
    return view('home');
})->name('home');

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
  
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});*/

require __DIR__ . '/auth.php';
