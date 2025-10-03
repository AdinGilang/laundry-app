<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/**
 * 🚀 Dashboard (bisa diakses setelah login & verifikasi email)
 */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/**
 * 👤 Route Profile (bawaan Breeze)
 */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/**
 * 👑 Route untuk Admin (pemilik)
 * - CRUD karyawan
 * - CRUD layanan
 */
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('karyawan', KaryawanController::class);
    Route::resource('layanan', LayananController::class);
});

/**
 * 👷👑 Route untuk User (karyawan) & Admin
 * - CRUD pesanan
 *   (Admin bisa lihat semua pesanan, User hanya miliknya → dibatasi di controller)
 */
Route::middleware(['auth'])->group(function () {
    Route::resource('pesanan', PesananController::class);
});

/**
 * 📌 Auth Routes (login, register, dll)
 */
require __DIR__.'/auth.php';
