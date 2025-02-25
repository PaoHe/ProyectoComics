<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\ComicController;

// Rutas de autenticación
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

// Ruta para la tienda principal
Route::get('/tiendaCliente', [ComicController::class, 'index'])->name('tiendaCliente');

// Ruta para la vista de un cómic en detalle
Route::get('/tiendaCliente/comic/{id}', [ComicController::class, 'show'])->name('comic.show');