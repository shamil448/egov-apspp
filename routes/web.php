<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RWController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// --------------------------------------------
// Rute Kritik & Saran
// --------------------------------------------
Route::get('/rw/kritiksaran', [RWController::class, 'kritikSaranForm'])->name('rw.kritik-saran'); // Tampilkan form kritik & saran
Route::post('/rw/kritiksaran', [RWController::class, 'submitKritikSaran'])->name('rw.kritik-saran.submit'); // Proses kritik & saran

// Rute untuk menampilkan inbox RW
Route::get('/rw/inbox', [RWController::class, 'inbox'])->name('rw.inbox');

// --------------------------------------------
// Rute untuk Logout RW (Pastikan hanya menggunakan satu logout route)
// --------------------------------------------
Route::post('/logout', [RWController::class, 'destroy'])->name('logout');

// Jadwal umum
Route::get('/jadwal', [RWController::class, 'index'])->name('rw.jadwal');
