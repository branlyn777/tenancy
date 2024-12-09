<?php

use App\Http\Controllers\TenantController;
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

    // Ruta protegida para TenantController

    Route::get('/tenant', [TenantController::class, 'index'])->name('tenant.index');
    Route::post('/tenant', [TenantController::class, 'store'])->name('tenant.store');

});


require __DIR__.'/auth.php';
