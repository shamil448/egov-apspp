<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RWController;

// Rute untuk halaman utama (Welcome Page)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// --------------------------------------------
// Rute Login dan Logout
// --------------------------------------------
Route::get('/login', [LoginController::class, 'index'])->name('login'); // Tampilan Login
Route::post('/login', [LoginController::class, 'login'])->name('login.post'); // Proses Login
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Proses Logout

// --------------------------------------------
// Rute Dashboard
// --------------------------------------------
// Dashboard untuk Admin
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Dashboard untuk Petugas
Route::get('/petugas/dashboard', function () {
    // Tambahkan logika untuk dashboard petugas
    return view('petugas.dashboard');
})->name('Petugas.dashboard');

// --------------------------------------------
// Rute untuk RW (Rukun Warga)
// --------------------------------------------
// Dashboard RW
Route::get('/rw/dashboard', [RWController::class, 'dashboard'])->name('RW.dashboard');

// Rute untuk fitur Kirim Lokasi di RW
Route::get('/rw/lokasi', [RWController::class, 'kirimLokasiForm'])->name('lokasi.form'); // Menampilkan form
Route::post('/rw/lokasi', [RWController::class, 'kirimLokasi'])->name('lokasi.submit'); // Proses pengiriman data lokasi

// --------------------------------------------
// Rute untuk Jadwal RW
// --------------------------------------------
Route::get('/rw/jadwal', [RWController::class, 'jadwal'])->name('jadwal.store'); // Menampilkan jadwal
