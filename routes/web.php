<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('barang.index'));

// Semua halaman barang wajib login (middleware auth)
Route::middleware('auth')->group(function () {
    Route::resource('barang', BarangController::class)->except('show');

    // Route bawaan Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route /dashboard bawaan Breeze, diarahkan ke daftar barang
Route::get('/dashboard', fn () => redirect()->route('barang.index'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__ . '/auth.php';
