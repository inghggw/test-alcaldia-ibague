<?php

use App\Livewire\DepartamentoForm;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::view('profile', 'profile')->name('profile');

    Route::get('/departamentos', DepartamentoForm::class)->name("departamentos");
});


require __DIR__ . '/auth.php';
