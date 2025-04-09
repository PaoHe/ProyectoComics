<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\FiguraController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\MiPerfilController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\UsuarioController;

// Rutas de autenticación
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::get('/loginAdmin', function () {
    return view('loginAdmin');
})->name('loginAdmin');

// Rutas de la tienda
Route::get('/tiendaCliente', function () {
    return view('tiendaCliente');
})->name('tiendaCliente');
Route::get('/compraComic/{id}', [ComicController::class, 'show'])->name('compraComic');

// Rutas de perfil y administración
Route::get('/mi-perfil', [MiPerfilController::class, 'index'])->name('miPerfil');
Route::get('/perfilAdmin', [AdminProfileController::class, 'edit'])->name('perfilAdmin');
Route::put('/perfilAdmin/{id}', [AdminProfileController::class, 'update'])->name('adminPerfil.update');
Route::get('/perfilAdmin/crear', [AdminProfileController::class, 'create'])->name('perfilAdmin.create');

// Rutas de productos, cómics y figuras
Route::get('/todos-productos', function () {
    return view('todosProductos');
})->name('todosProductos');

Route::get('/RegistroProductos', function () {
    return view('productosRegistro');
})->name('productosRegistro');

Route::get('/productos', [ProductoController::class, 'index'])->name('todosProductos');

Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');

Route::get('/productos/{id}/editar', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');

Route::get('/agregarComic', [ComicController::class, 'create'])->name('comicsRegistro');
Route::post('/comics', [ComicController::class, 'store'])->name('comics.store');
Route::get('/comics/crear', [ComicController::class, 'create'])->name('comics.create');

Route::get('/agregarFigura', [FiguraController::class, 'create'])->name('figurasRegistro');
Route::post('/figuras', [FiguraController::class, 'store'])->name('figuras.store');
Route::get('/figuras/crear', [FiguraController::class, 'create'])->name('figuras.create');

// Rutas de contacto
Route::get('/contacto', [ContactoController::class, 'formulario'])->name('contacto.formulario');
Route::post('/contacto', [ContactoController::class, 'enviar'])->name('contacto.enviar');

// Rutas de proveedores
Route::get('/proveedores', [ProveedorController::class, 'index'])->name('proveedores.index');
Route::get('/proveedores/crear', [ProveedorController::class, 'create'])->name('proveedores.create');
Route::post('/proveedores', [ProveedorController::class, 'store'])->name('proveedores.store');

Route::get('/proveedores/{id}/editar', [ProveedorController::class, 'edit'])->name('proveedores.editar');
Route::put('/proveedores/{id}', [ProveedorController::class, 'update'])->name('proveedores.update');
Route::delete('/proveedores/{id}', [ProveedorController::class, 'destroy'])->name('proveedores.destroy');

// Rutas de compras y membresía
Route::get('/membresia', function () {
    return view('membresia');
})->name('membresia');
Route::get('/mis-compras', function () {
    return view('misCompras');
})->name('misCompras');
Route::get('/misPedidos', function () {
    return view('misPedidos');
})->name('misPedidos');

// Rutas de PayPal
Route::post('/api/pago/exito', [PaypalController::class, 'registroPago'])->name('registroPago');
Route::post('/paypal/create-order', [PaypalController::class, 'createPaypalOrder'])->name('paypal.createOrder');
Route::get('/paypal/success', [PaypalController::class, 'paypalSuccess'])->name('paypal.success');
Route::get('/paypal/cancel', [PaypalController::class, 'paypalCancel'])->name('paypal.cancel');

//API
Route::post('/usuario', [UsuarioController::class, 'store']);
