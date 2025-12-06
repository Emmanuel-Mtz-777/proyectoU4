<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\LapTimeController;

Route::post('/lap', [LapTimeController::class, 'calcular']);

use App\Http\Controllers\DiscountController;

Route::post('/discount/calculate', [DiscountController::class, 'calculate']);