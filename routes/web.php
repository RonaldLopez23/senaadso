<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AutenticaController;
use App\Http\Controllers\PedidoController;

Route::view('/', 'inicio')->name('inicio');

// Rutas para categorías
Route::resource('categorias', CategoriaController::class);

// Rutas para productos
Route::resource('productos', ProductoController::class);

// Rutas de autenticación
Route::view('/registro', 'autenticacion.registro')->name('registro');
Route::post('/registro', [AutenticaController::class, 'registro'])->name('registro.store');
Route::view('/login', 'autenticacion.login')->name('login');
Route::post('/login', [AutenticaController::class, 'login'])->name('login.store');
Route::post('/logout', [AutenticaController::class, 'logout'])->name('logout');
Route::get('/perfil', [AutenticaController::class, 'perfil'])->name('perfil');
Route::put('/perfil/{user}', [AutenticaController::class, 'updatePerfil'])->name('perfil.update');
Route::put('/perfil/password/{user}', [AutenticaController::class, 'updatePassword'])->name('perfil.password.update');

// Rutas para pedidos
Route::resource('pedidos', PedidoController::class)->except(['create', 'show']);
Route::get('/pedidos/create/{producto}', [PedidoController::class, 'createWithProduct'])->name('pedidos.createWithProduct');
