<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RWController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemerintahController;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\EdukasiController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\MasterDataController;
use App\Http\Controllers\PetugasController;

Route::get('/', function () {
    return view('home');
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
Route::post('/rw/lokasi', [RWController::class, 'PengangkutanDarurat'])->name('rw.lokasi.submit'); // Proses pengiriman data lokasi

// --------------------------------------------
// Rute untuk Jadwal RW
// --------------------------------------------
Route::get('/rw/jadwal', [RWController::class, 'jadwal'])->name('jadwal.store'); // Menampilkan jadwal

//shamil
//routes fitur tambah akun
Route::resource('users', UserController::class);

// --------------------------------------------
// Rute Kritik & Saran
// --------------------------------------------
Route::get('/rw/kritik-saran', [RWController::class, 'kritikSaranForm'])->name('rw.kritik-saran'); // Tampilkan form kritik & saran
Route::post('/rw/kritik-saran', [RWController::class, 'submitKritikSaran'])->name('rw.kritik-saran.submit'); // Proses kritik & saran

// Rute untuk menampilkan inbox RW
Route::get('/rw/inbox', [RWController::class, 'inbox'])->name('rw.inbox');

// --------------------------------------------
// Rute untuk Logout RW (Pastikan hanya menggunakan satu logout route)
// --------------------------------------------
Route::post('/logout', [RWController::class, 'destroy'])->name('logout');

// Jadwal umum
Route::get('/jadwal', [RWController::class, 'index'])->name('rw.jadwal');


Route::get('/Pemerintah/dashboard', [PemerintahController::class, 'dashboard'])->name('pemerintah.dashboard');
Route::get('/Pemerintah/laporan-harian', [PemerintahController::class, 'laporanharian'])->name('pemerintah.laporanharian');
Route::get('/Pemerintah/tambah-akun', [PemerintahController::class, 'tambahAkun'])->name('pemerintah.tambahakun');
Route::get('/Pemerintah/tambah-edukasi', [PemerintahController::class, 'tambahEdukasi'])->name('pemerintah.tambahedukasi');
Route::get('/Pemerintah/tpa-tps', [PemerintahController::class, 'pengawasanTpaTps'])->name('pemerintah.tpatps');
Route::get('/Pemerintah/pelaporan', [PemerintahController::class, 'pelaporan'])->name('pemerintah.pelaporan');
Route::get('/Pemerintah/logout', [PemerintahController::class, 'logout'])->name('pemerintah.logout');

// Rute untuk menampilkan form lupa password
Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('password.request');
// Rute untuk mengirim link reset password ke email
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
    $status = Password::sendResetLink(
        $request->only('email')
    );
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->name('password.email');
Route::get('/feedback', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
Route::get('/about-us', function () {
    return view('about-us');
});
Route::get('/partner', function () {
    return view('partner');
});
Route::get('/educations', [EdukasiController::class, 'index'])->name('home');
Route::get('/education/{id}', [EdukasiController::class, 'show'])->name('education.show');
Route::resource('kecamatan', KecamatanController::class);
Route::resource('kelurahan', KelurahanController::class);




Route::prefix('pemerintah')->middleware(['auth', 'role:Pemerintah'])->group(function () {
Route::get('/dashboard', [PemerintahController::class, 'dashboard'])->name('pemerintah.dashboard');
Route::get('/laporan-harian', [PemerintahController::class, 'laporanharian'])->name('pemerintah.laporanharian');
Route::get('/tambah-akun', [PemerintahController::class, 'tambahAkun'])->name('pemerintah.tambahakun');
Route::get('/jadwal', [PemerintahController::class, 'jadwal'])->name('pemerintah.jadwal');
Route::get('/tambah-edukasi', [PemerintahController::class, 'tambahEdukasi'])->name('pemerintah.tambahedukasi');
Route::get('/tpa-tps', [PemerintahController::class, 'pengawasanTpaTps'])->name('pemerintah.tpatps');
Route::get('/pelaporan', [PemerintahController::class, 'pelaporan'])->name('pemerintah.pelaporan');
Route::get('/logout', [PemerintahController::class, 'logout'])->name('pemerintah.logout');
Route::get('/laporan.kritik-saran', [PemerintahController::class, 'laporanKritikSaran'])
    ->name('pemerintah.laporan.kritik-saran');
Route::get('/petugas', [PetugasController::class, 'index'])->name('pemerintah.petugas');
Route::get('/rw', [RwController::class, 'index'])->name('pemerintah.rw');
Route::get('/kelurahan', [KelurahanController::class, 'index'])->name('pemerintah.kelurahan');
Route::get('/kecamatan', [KecamatanController::class, 'index'])->name('pemerintah.kecamatan');
Route::get('/tambah-akun', [PemerintahController::class, 'tambahAkun'])->name('pemerintah.tambah-akun');
Route::post('/tambah-akun', [PemerintahController::class, 'tambahAkunSubmit'])->name('pemerintah.tambah-akun.submit');
});


Route::prefix('pemerintah/Akun')->middleware(['auth', 'role:Pemerintah'])->group(function () {
    Route::get('/Index', [PemerintahController::class, 'listAkun'])->name('pemerintah.index-akun');
    Route::get('/Tambah', [PemerintahController::class, 'tambahAkun'])->name('pemerintah.tambah-akun');
    Route::post('/Tambah', [PemerintahController::class, 'tambahAkunSubmit'])->name('pemerintah.tambah-akun.submit');
    Route::get('/Update/{id}', [PemerintahController::class, 'editAkun'])->name('pemerintah.update-akun');
    Route::post('/Update/{id}', [PemerintahController::class, 'updateAkun'])->name('pemerintah.update-akun');
    Route::delete('/Delete/{id}', [PemerintahController::class, 'deleteAkun'])->name('pemerintah.delete-akun');
});

Route::prefix('pemerintah/Master_Data/RW')->middleware(['auth', 'role:Pemerintah'])->group(function () {
    Route::get('/Index', [MasterDataController::class, 'listrw'])->name('pemerintah.master_data.index-rw');
    Route::get('/Tambah', [MasterDataController::class, 'tambahrw'])->name('pemerintah.master_data.tambah-rw');
    Route::post('/Tambah', [MasterDataController::class, 'tambahrwSubmit'])->name('pemerintah.master_data.tambah-rw.submit');
});

Route::prefix('pemerintah/Master_Data/Petugas')->middleware(['auth', 'role:Pemerintah'])->group(function () {
    Route::get('/Index', [MasterDataController::class, 'listpetugas'])->name('pemerintah.master_data.index-petugas');
    Route::get('/Tambah', [MasterDataController::class, 'tambahpetugas'])->name('pemerintah.master_data.tambah-petugas');
    Route::post('/Tambah', [MasterDataController::class, 'tambahpetugasSubmit'])->name('pemerintah.master_data.tambah-petugas.submit');
    Route::get('/{id}/Edit', [MasterDataController::class, 'editPetugas'])->name('pemerintah.master_data.edit-petugas');
    Route::put('/{id}/Update', [MasterDataController::class, 'updatePetugas'])->name('pemerintah.master_data.update-petugas');
    Route::delete('/Delete/{id}', [MasterDataController::class, 'deletePetugas'])->name('pemerintah.master_data.delete-petugas');
});

Route::prefix('pemerintah/Jadwal')->middleware(['auth', 'role:Pemerintah'])->group(function () {
    Route::get('/Index', [PemerintahController::class, 'listjadwal'])->name('pemerintah.index-jadwal');

});

Route::prefix('pemerintah')->middleware(['auth', 'role:Pemerintah'])->group(function () {
    Route::get('/tambah-edukasi', [EdukasiController::class, 'create'])->name('pemerintah.tambahedukasi');
    Route::post('/tambah-edukasi', [EdukasiController::class, 'store']);
    Route::get('/list-edukasi', [EdukasiController::class, 'index'])->name('pemerintah.listedukasi');
    Route::post('/upload-media', [EdukasiController::class, 'uploadMedia'])->name('pemerintah.uploadmedia');
});





Route::prefix('rw')->middleware(['auth', 'role:RW'])->group(function () {
Route::get('/dashboard', [RWController::class, 'dashboard'])->name('rw.dashboard');
Route::get('/lokasi', [RWController::class, 'kirimLokasiForm'])->name('rw.lokasi'); // Menampilkan form
Route::post('/lokasi', [RWController::class, 'PengangkutanDarurat'])->name('rw.lokasi.submit'); // Proses pengiriman data lokasi
Route::get('/jadwal', [RWController::class, 'jadwal'])->name('jadwal.store');
Route::get('/kritik-saran', [RWController::class, 'kritikSaranForm'])->name('rw.kritik-saran');
Route::post('/kritik-saran', [RWController::class, 'submitKritikSaran'])->name('rw.kritik-saran.submit');
Route::get('/rw/inbox', [RWController::class, 'inbox'])->name('rw.inbox');
Route::post('/logout', [RWController::class, 'destroy'])->name('logout');
Route::get('/jadwal', [RWController::class, 'index'])->name('rw.jadwal');
});





Route::prefix('petugas')->middleware(['auth', 'role:Petugas'])->group(function () {
    Route::get('/dashboard', [PetugasController::class, 'dashboard'])->name('petugas.dashboard');
    Route::get('/jadwalrute', [PetugasController::class, 'jadwalRute'])->name('petugas.jadwalrute');
    Route::get('/laporantugas', [PetugasController::class, 'laporanTugas'])->name('petugas.laporantugas');
    Route::post('laporan-tugas', [PetugasController::class, 'submitLaporan'])->name('petugas.submitLaporan');
});
