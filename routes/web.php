<?php

use App\Livewire\Ambiente\AmbienteCreate;
use App\Livewire\Ambiente\AmbienteEdit;
use App\Livewire\Ambiente\AmbienteIndex;
use App\Livewire\Dashboard;
use App\Livewire\Registro\RegistroIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class);

Route::prefix('ambientes')->group(function(){
    Route::get('/index', AmbienteIndex::class)->name('ambientes.index');
    Route::get('/create', AmbienteCreate::class)->name('ambientes.create');
    Route::get('edit/{id}', AmbienteEdit::class)->name('ambientes.edit');


});

Route::prefix('registros')->group(function(){
    Route::get('/index', RegistroIndex::class)->name('registros.index');
});


