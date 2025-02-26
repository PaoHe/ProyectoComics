<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\ComicController;


Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

Route::get('/tiendaCliente', function () {
    return view('tiendaCliente');
})->name('tiendaCliente');

Route::get('/compraComic/{id}', [ComicController::class, 'show'])->name('compraComic');

