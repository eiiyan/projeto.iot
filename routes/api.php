<?php

use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SensorController;
use App\Livewire\Sensor\SensorStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('registro/create' , [RegistroController::class, 'store']);
Route::get('sensor/{codigo}/visualizar', [SensorController::class, 'visualizar']);
Route::put('sensor/atualizar', [SensorController::class, 'update']);
Route::get('sensor/listar', [SensorController::class, 'listar']);
