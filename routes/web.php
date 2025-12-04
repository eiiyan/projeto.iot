<?php

use App\Livewire\Ambiente\AmbienteCreate;
use App\Livewire\Ambiente\AmbienteEdit;
use App\Livewire\Ambiente\AmbienteIndex;
use App\Livewire\Auth\Login;
use App\Livewire\Dashboard;

use App\Livewire\Registro\RegistroIndex;

use App\Livewire\Sensor\SensorCreate;
use App\Livewire\Sensor\SensorEdit;
use App\Livewire\Sensor\SensorIndex;
use App\Livewire\Sensor\SensorStatus;
use App\Livewire\User\UserCreate;
use App\Livewire\User\UserIndex;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', Dashboard::class)->name('dashboard');

Route::prefix('ambientes')->group(function () {
    Route::get('/index', AmbienteIndex::class)->name('ambientes.index')->middleware('auth');
    Route::get('/create', AmbienteCreate::class)->name('ambientes.create')->middleware('auth');
    Route::get('edit/{id}', AmbienteEdit::class)->name('ambientes.edit')->middleware('auth');
});


Route::prefix('registros')->group(function () {
    Route::get('/index', RegistroIndex::class)->name('registros.index')->middleware('auth');
});


Route::prefix('sensores')->group(function () {
    Route::get('/index', SensorIndex::class)->name('sensores.index')->middleware('auth');
    Route::get('/create', SensorCreate::class)->name('sensores.create')->middleware('auth');
    Route::get('edit/{id}', SensorEdit::class)->name('sensores.edit')->middleware('auth');
    Route::get('/status', SensorStatus::class)->name('sensores.status')->middleware('auth');
});

Route::prefix('users')->group(function () {
    Route::get('/create', UserCreate::class)->name('usuarios.create')->middleware('auth');
    Route::get('/index', UserIndex::class)->name('usuarios.index')->middleware('auth');
});

Route::get('/', Login::class)->name('login');
