<?php

use App\Livewire\DepartamentoForm;
use App\Livewire\EmpleadoForm;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::view('profile', 'profile')->name('profile');

    Route::get('/departamentos', DepartamentoForm::class)->name("departamentos");

    Route::get('/empleados', EmpleadoForm::class)->name("empleados");
});


require __DIR__ . '/auth.php';
