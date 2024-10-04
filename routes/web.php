<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RWController;

// Rute untuk tampilan utama
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk tampilan login
Route::get('/login', [LoginController::class, 'index'])->name('login');

// Rute untuk proses login
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Rute untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rute untuk dashboard admin
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Rute untuk dashboard petugas
Route::get('/petugas/dashboard', function () {
    // Tambahkan logika atau rute ke kontroler dashboard petugas di sini
})->name('Petugas.dashboard');

// Rute untuk dashboard RW
Route::get('/rw/dashboard', [RWController::class, 'dashboard'])->name('RW.dashboard');