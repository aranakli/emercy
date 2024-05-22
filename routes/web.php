<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VisitanteController;
use App\Http\Controllers\FamiliarController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ObituarioController;
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
    // Rutas de visitantes
    Route::get('/visitantes', [VisitanteController::class, 'index'])->name('visitantes.index');
    Route::post('/visitantes', [VisitanteController::class, 'store'])->name('visitantes.store');
    Route::get('/visitantes/create', [VisitanteController::class, 'create'])->name('visitantes.create');
    Route::delete('/visitantes/{visitante}', [VisitanteController::class, 'destroy'])->name('visitantes.destroy');
    Route::put('/visitantes/{visitante}', [VisitanteController::class, 'update'])->name('visitantes.update');
    Route::get('/visitantes/{visitante}/edit', [VisitanteController::class, 'edit'])->name('visitantes.edit');
    // Rutas de familiares
    Route::get('/familiares', [FamiliarController::class, 'index'])->name('familiares.index');
    Route::post('/familiares', [FamiliarController::class, 'store'])->name('familiares.store');
    Route::get('/familiares/create', [FamiliarController::class, 'create'])->name('familiares.create');
    Route::delete('/familiares/{familiar}', [FamiliarController::class, 'destroy'])->name('familiares.destroy');
    Route::put('/familiares/{familiar}', [FamiliarController::class, 'update'])->name('familiares.update');
    Route::get('/familiares/{familiar}/edit', [FamiliarController::class, 'edit'])->name('familiares.edit');
    // Rutas de productos
    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
    Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
    Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
    Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
    Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
    // Rutas de ventas
    Route::get('/ventas', [VentaController::class, 'index'])->name('ventas.index');
    Route::post('/ventas', [VentaController::class, 'store'])->name('ventas.store');
    Route::get('/ventas/create', [VentaController::class, 'create'])->name('ventas.create');
    Route::delete('/ventas/{venta}', [VentaController::class, 'destroy'])->name('ventas.destroy');
    Route::put('/ventas/{venta}', [VentaController::class, 'update'])->name('ventas.update');
    Route::get('/ventas/{venta}/edit', [VentaController::class, 'edit'])->name('ventas.edit');
    // Rutas de obituarios
    Route::get('/obituarios', [ObituarioController::class, 'index'])->name('obituarios.index');
    Route::post('/obituarios', [ObituarioController::class, 'store'])->name('obituarios.store');
    Route::get('/obituarios/create', [ObituarioController::class, 'create'])->name('obituarios.create');
    Route::delete('/obituarios/{obituario}', [ObituarioController::class, 'destroy'])->name('obituarios.destroy');
    Route::put('/obituarios/{obituario}', [ObituarioController::class, 'update'])->name('obituarios.update');
    Route::get('/obituarios/{obituario}/edit', [ObituarioController::class, 'edit'])->name('obituarios.edit');
    // Rutas de pqrss
    Route::get('/pqrss', [pqrsController::class, 'index'])->name('pqrss.index');
    Route::post('/pqrss', [pqrsController::class, 'store'])->name('pqrss.store');
    Route::get('/pqrss/create', [pqrsController::class, 'create'])->name('pqrss.create');
    Route::delete('/pqrss/{pqrs}', [pqrsController::class, 'destroy'])->name('pqrss.destroy');
    Route::put('/pqrss/{pqrs}', [pqrsController::class, 'update'])->name('pqrss.update');
    Route::get('/pqrss/{pqrs}/edit', [pqrsController::class, 'edit'])->name('pqrss.edit');
});

require __DIR__ . '/auth.php';
