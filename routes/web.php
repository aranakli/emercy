<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PQRSController;
use App\Http\Controllers\SalaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Rutas de salas
    Route::get('/salas', [SalaController::class, 'index'])->name('salas.index');
    Route::post('/salas', [SalaController::class, 'store'])->name('salas.store');
    Route::get('/salas/create', [SalaController::class, 'create'])->name('salas.create');
    Route::delete('/salas/{sala}', [SalaController::class, 'destroy'])->name('salas.destroy');
    Route::put('/salas/{sala}', [SalaController::class, 'update'])->name('salas.update');
    Route::get('/salas/{sala}/edit', [SalaController::class, 'edit'])->name('salas.edit');
    // Rutas de clientes
    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
    Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
    Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
    // Rutas de pqrss
    Route::get('/PQRSs', [PQRSController::class, 'index'])->name('PQRSs.index');
    Route::post('/PQRSs', [PQRSController::class, 'store'])->name('PQRSs.store');
    Route::get('/PQRSs/create', [PQRSController::class, 'create'])->name('PQRSs.create');
    Route::delete('/PQRSs/{PQRS}', [PQRSController::class, 'destroy'])->name('PQRSs.destroy');
    Route::put('/PQRSs/{PQRS}', [PQRSController::class, 'update'])->name('PQRSs.update');
    Route::get('/PQRSs/{PQRS}/edit', [PQRSController::class, 'edit'])->name('PQRSs.edit');
});

require __DIR__ . '/auth.php';
