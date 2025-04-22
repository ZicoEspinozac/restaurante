<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComensalController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\MesaController;

Route::apiResource('comensals', ComensalController::class);
Route::apiResource('reservas',  ReservaController::class);
Route::apiResource('mesas',     MesaController::class);