<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdenamientoController;
Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\LapTimeController;

Route::post('/lap', [LapTimeController::class, 'calcular']);
// Rutas para el nuevo módulo de Ordenamiento
Route::get('/ordenar', [OrdenamientoController::class, 'index'])->name('ordenamiento.index');
Route::post('/ordenar', [OrdenamientoController::class, 'ordenar'])->name('ordenamiento.ordenar');
