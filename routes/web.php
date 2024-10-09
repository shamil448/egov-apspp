<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Login1Controller;
use App\Http\Controllers\RWController;
use App\Http\Controllers\UserController;

// Rute untuk halaman utama (Welcome Page)
Route::get('/', function () {
    return view('welcome');
});

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
    // Tambahkan logika atau rute ke kontroler dashboard petugas di sini
    return view('petugas.dashboard');
})->name('Petugas.dashboard');

// --------------------------------------------
// Rute untuk RW (Rukun Warga)
// --------------------------------------------
// Dashboard RW
Route::get('/rw/dashboard', [RWController::class, 'dashboard'])->name('rw.dashboard');

// Rute untuk fitur Kirim Lokasi di RW
Route::get('/rw/lokasi', [RWController::class, 'kirimLokasiForm'])->name('rw.lokasi'); // Menampilkan form
Route::post('/rw/lokasi', [RWController::class, 'kirimLokasi'])->name('rw.lokasi.submit'); // Proses pengiriman data lokasi

// --------------------------------------------
// Rute untuk Jadwal RW
// --------------------------------------------
Route::get('/rw/jadwal', [RWController::class, 'jadwal'])->name('jadwal.store'); // Menampilkan jadwal

//shamil
//routes fitur tambah akun
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
//shamil

// Rute untuk menampilkan form Kritik dan Saran
Route::get('/rw/kritik-saran', [RWController::class, 'kritikSaranForm'])->name('rw.kritik-saran');

// Rute untuk memproses pengiriman Kritik dan Saran
Route::post('/rw/kritik-saran', [RWController::class, 'submitKritikSaran'])->name('rw.kritik-saran.submit');

// Rute untuk menampilkan inbox RW
Route::get('/rw/inbox', [RWController::class, 'inbox'])->name('rw.inbox');

Route::get('/jadwal', [RWController::class, 'index'])->name('rw.jadwal');

Route::post('/logout', [RWController::class, 'destroy'])->name('logout');