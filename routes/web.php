<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AutenticaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\NewPasswordController;

Route::view('/', 'welcome')->name('welcome');

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
Route::get('/perfil/editar/{user}', [AutenticaController::class, 'perfilEdit'])->name('perfil.edit');
Route::put('/perfil/{user}', [AutenticaController::class, 'perfilUpdate'])->name('perfil.update');
Route::get('/perfil/password/editar/{user}', [AutenticaController::class, 'perfilPasswordEdit'])->name('perfil.password.edit');
Route::put('/perfil/password/{user}', [AutenticaController::class, 'passwordUpdate'])->name('perfil.password.update');

// Rutas para pedidos
Route::resource('pedidos', PedidoController::class)->except(['create', 'show']);
Route::get('/pedidos/create/{producto}', [PedidoController::class, 'createWithProduct'])->name('pedidos.createWithProduct');

// Rutas para restablecimiento de contraseña
Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');
