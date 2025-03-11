<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\ComicController;
use App\Http\Controllers\MiPerfilController; 

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

Route::get('/loginAdmin', function () {
    return view('loginAdmin');
})->name('loginAdmin');

Route::get('/tiendaCliente', function () {
    return view('tiendaCliente');
})->name('tiendaCliente');

Route::get('/compraComic/{id}', [ComicController::class, 'show'])->name('compraComic');
Route::post('/agregar-al-carrito/{id}', [ComicController::class, 'agregarAlCarrito'])->name('agregarAlCarrito');
Route::get('/carrito', function () {
    return view('carrito'); 
})->name('carrito');

Route::get('/mi-perfil', [MiPerfilController::class, 'index'])->name('miPerfil');

Route::get('/membresia', function () {
    return view('membresia');
})->name('membresia');

Route::get('/mis-compras', function () {
    return view('misCompras');
})->name('misCompras');

Route::get('/misPedidos', function () {
    return view('misPedidos');
})->name('misPedidos');

Route::get('/todos-productos', function () {
    return view('todosProductos');
})->name('todosProductos');

Route::get('/RegistroProductos', function () {
    return view('productosRegistro');
})->name('productosRegistro');

Route::get('/Productos', function () {
    return view('todosProductos');
})->name('todosProductos');

Route::get('/agregarComic', function () {
    return view('comicsRegistro');
})->name('comicsRegistro');

Route::get('/agregarFigura', function () {
    return view('figurasRegistro');
})->name('figurasRegistro');

Route::get('/Admin', function () {
    return view('perfilAdmin');
})->name('perfilAdmin');