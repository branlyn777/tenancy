<?php

use App\Livewire\TenantcyController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


// Rutas protegidas (requieren login)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');

    // Ruta protegida para TenantcyController
    Route::get('tenantcy', TenantcyController::class)->name('tenantcy');
});


require __DIR__.'/auth.php';
