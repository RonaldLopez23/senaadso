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
Route::put('/perfil/{user}', [AutenticaController::class, 'updatePerfil'])->name('perfil.update');
Route::put('/perfil/password/{user}', [AutenticaController::class, 'updatePassword'])->name('perfil.password.update');

// Rutas para pedidos
Route::resource('pedidos', PedidoController::class)->except(['create', 'show']);
Route::get('/pedidos/create/{producto}', [PedidoController::class, 'createWithProduct'])->name('pedidos.createWithProduct');

// Rutas para restablecimiento de contraseña
Route::get('password/reset', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('password/email', [PasswordResetLinkController::class, 'store'])->name('password.email');

// Rutas para solicitar y enviar el enlace de restablecimiento de contraseña
Route::get('password/reset', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('password/email', [PasswordResetLinkController::class, 'store'])->name('password.email');

// Rutas para mostrar y procesar el formulario de restablecimiento de contraseña
Route::get('password/reset/{token}', [PasswordController::class, 'showResetForm'])->name('password.reset.form');
Route::post('password/reset', [PasswordController::class, 'reset'])->name('password.update');

// Rutas para el controlador NewPasswordController
Route::get('password/reset/new/{token}', [NewPasswordController::class, 'create'])->name('password.reset.new.form');
Route::post('password/reset/new', [NewPasswordController::class, 'store'])->name('password.update.new');
