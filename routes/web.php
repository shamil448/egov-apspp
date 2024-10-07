@ -1,37 +1,49 @@
<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Login1Controller;
use App\Http\Controllers\RWController;

// Rute untuk tampilan utama
// Rute untuk halaman utama (Welcome Page)
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
Route::get('/dashboard', function () {
    // Tambahkan logika atau rute ke kontroler dashboard admin di sini
})->name('dashboard');

// Rute untuk dashboard petugas


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
    // Tambahkan logika untuk dashboard petugas
    return view('petugas.dashboard');
})->name('Petugas.dashboard');

// Rute untuk dashboard RW
Route::get('/rw/dashboard', function () {
    // Tambahkan logika atau rute ke kontroler dashboard RW di sini
})->name('RW.dashboard');
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

//shamil
//routes fitur tambah akun
Route::get('/accounts/create', [AccountController::class, 'create'])->name('accounts.create');
Route::post('/accounts', [AccountController::class, 'store'])->name('accounts.store');
//shamil
