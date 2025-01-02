<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RWController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemerintahController;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\EdukasiController;
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
//Route::resource('kecamatan', KecamatanController::class);

Route::prefix('pemerintah')->middleware(['auth', 'role:Pemerintah'])->group(function () {
Route::get('/dashboard', [PemerintahController::class, 'dashboard'])->name('pemerintah.dashboard');
Route::get('/laporan-harian', [PemerintahController::class, 'laporanharian'])->name('pemerintah.laporanharian');
Route::get('/jadwal', [PemerintahController::class, 'jadwal'])->name('pemerintah.jadwal');
Route::get('/tpa-tps', [PemerintahController::class, 'pengawasanTpaTps'])->name('pemerintah.tpatps');
Route::get('/pelaporan', [PemerintahController::class, 'pelaporan'])->name('pemerintah.pelaporan');
Route::get('/logout', [PemerintahController::class, 'logout'])->name('pemerintah.logout');
Route::get('/laporan.kritik-saran', [PemerintahController::class, 'laporanKritikSaran'])
    ->name('pemerintah.laporan.kritik-saran');
Route::get('/petugas', [PetugasController::class, 'index'])->name('pemerintah.petugas');
Route::get('/rw', [RwController::class, 'index'])->name('pemerintah.rw');
//Route::get('/kecamatan', [KecamatanController::class, 'index'])->name('pemerintah.kecamatan');
Route::get('/tambah-akun', [PemerintahController::class, 'tambahAkun'])->name('pemerintah.tambah-akun');
Route::post('/tambah-akun', [PemerintahController::class, 'tambahAkunSubmit'])->name('pemerintah.tambah-akun.submit');
Route::get('/tpa-tps', [PemerintahController::class, 'TpaTpsindex'])->name('pemerintah.tpa_tps');
        Route::get('/tambah-tpa-tps', [PemerintahController::class, 'TpaTpscreate'])->name('pemerintah.tambah-tpa-tps');
        Route::post('/tambah-tpa-tps', [PemerintahController::class, 'TpaTpsstore'])->name('pemerintah.tambah-tpa-tps.submit');
        Route::get('/edit-tpa-tps/{id}', [PemerintahController::class, 'TpaTpsedit'])->name('pemerintah.edit-tpa-tps');
        Route::put('/edit-tpa-tps/{id}', [PemerintahController::class, 'TpaTpsupdate'])->name('pemerintah.update-tpa-tps');
        Route::delete('/delete-tpa-tps/{id}', [PemerintahController::class, 'TpaTpsdestroy'])->name('pemerintah.delete-tpa-tps');
});


Route::prefix('pemerintah/Akun')->middleware(['auth', 'role:Pemerintah'])->group(function () {
    Route::get('/Index', [PemerintahController::class, 'listAkun'])->name('pemerintah.index-akun');
    Route::get('/Tambah/Pemerintah', [PemerintahController::class, 'tambahAkun'])->name('pemerintah.tambah-akun-pemerintah');
    Route::post('/Tambah/Pemerintah', [PemerintahController::class, 'tambahAkunSubmit'])->name('pemerintah.tambah-akun-pemerintah.submit');
    Route::get('/Tambah/Petugas', [PemerintahController::class, 'tambahAkunPetugas'])->name('pemerintah.tambah-akun-petugas');
    Route::post('/Tambah/Petugas', [PemerintahController::class, 'tambahAkunPetugasSubmit'])->name('pemerintah.tambah-akun-petugas.submit');
    Route::get('/Tambah/RW', [PemerintahController::class, 'tambahAkunRW'])->name('pemerintah.tambah-akun-rw');
    Route::post('/Tambah/RW', [PemerintahController::class, 'tambahAkunRWSubmit'])->name('pemerintah.tambah-akun-rw.submit');
    Route::get('/Update/{id}', [PemerintahController::class, 'editAkun'])->name('pemerintah.update-akun');
    Route::post('/Update/{id}', [PemerintahController::class, 'updateAkun'])->name('pemerintah.update-akun');
    Route::put('/Update/{id}', [PemerintahController::class, 'updateAkun'])->name('pemerintah.update-akun');
    Route::delete('/Delete/{id}', [PemerintahController::class, 'deleteAkun'])->name('pemerintah.delete-akun');
});

Route::prefix('pemerintah/Master_Data/RW')->middleware(['auth', 'role:Pemerintah'])->group(function () {
    Route::get('/Index', [MasterDataController::class, 'listrw'])->name('pemerintah.master_data.index-rw');
    Route::get('/Tambah', [MasterDataController::class, 'tambahrw'])->name('pemerintah.master_data.tambah-rw');
    Route::post('/Tambah', [MasterDataController::class, 'tambahrwSubmit'])->name('pemerintah.master_data.tambah-rw.submit');
    Route::get('/{id}/Edit', [MasterDataController::class, 'editrw'])->name('pemerintah.master_data.edit-rw');
    Route::put('/{id}/Update', [MasterDataController::class, 'updaterw'])->name('pemerintah.master_data.update-rw');
    Route::delete('/Delete/{id}', [MasterDataController::class, 'deleterw'])->name('pemerintah.master_data.delete-rw');
});

Route::prefix('pemerintah/Master_Data/Petugas')->middleware(['auth', 'role:Pemerintah'])->group(function () {
    Route::get('/Index', [MasterDataController::class, 'listpetugas'])->name('pemerintah.master_data.index-petugas');
    Route::get('/Tambah', [MasterDataController::class, 'tambahpetugas'])->name('pemerintah.master_data.tambah-petugas');
    Route::post('/Tambah', [MasterDataController::class, 'tambahpetugasSubmit'])->name('pemerintah.master_data.tambah-petugas.submit');
    Route::get('/{id}/Edit', [MasterDataController::class, 'editPetugas'])->name('pemerintah.master_data.edit-petugas');
    Route::put('/{id}/Update', [MasterDataController::class, 'updatePetugas'])->name('pemerintah.master_data.update-petugas');
    Route::delete('/Delete/{id}', [MasterDataController::class, 'deletePetugas'])->name('pemerintah.master_data.delete-petugas');
});

Route::prefix('pemerintah/Master_Data/kecamatan')->middleware(['auth', 'role:Pemerintah'])->group(function () {
    Route::get('/Index', [MasterDataController::class, 'kecamatanindex'])->name('pemerintah.master_data.index-kecamatan');
    Route::get('/Tambah', [MasterDataController::class, 'kecamatancreate'])->name('pemerintah.master_data.tambah-kecamatan');
    Route::post('/Tambah', [MasterDataController::class, 'kecamatanstore'])->name('pemerintah.master_data.tambah-kecamatan.submit');
    Route::get('/{id}/Edit', [MasterDataController::class, 'kecamatanedit'])->name('pemerintah.master_data.edit-kecamatan');
    Route::put('/{id}/Update', [MasterDataController::class, 'kecamatanupdate'])->name('pemerintah.master_data.update-kecamatan');
    Route::delete('/Delete/{id}', [MasterDataController::class, 'kecamatandestroy'])->name('pemerintah.master_data.delete-kecamatan');
});


Route::prefix('pemerintah/Jadwal')->middleware(['auth', 'role:Pemerintah'])->group(function () {
    Route::get('/Index', [PemerintahController::class, 'listjadwal'])->name('pemerintah.index-jadwal');
    Route::get('/Tambah', [PemerintahController::class, 'tambahjadwal'])->name('pemerintah.tambah-jadwal');
    Route::post('/Tambah', [PemerintahController::class, 'tambahjadwalSubmit'])->name('pemerintah.tambah-jadwal.submit');
    Route::get('/{id}/Edit', [PemerintahController::class, 'editjadwal'])->name('pemerintah.edit-jadwal');
    Route::put('/{id}/Update', [PemerintahController::class, 'updatejadwal'])->name('pemerintah.update-jadwal');
    Route::delete('/Delete/{id}', [PemerintahController::class, 'deletejadwal'])->name('pemerintah.delete-jadwal');
});

Route::prefix('pemerintah')->middleware(['auth', 'role:Pemerintah'])->group(function () {
    Route::get('/tambah-edukasi', [EdukasiController::class, 'create'])->name('pemerintah.tambahedukasi');
    Route::post('/tambah-edukasi', [EdukasiController::class, 'store']);
    Route::get('/list-edukasi', [EdukasiController::class, 'index'])->name('pemerintah.listedukasi');
    Route::post('/pemerintah/storeEdukasi', [EdukasiController::class, 'storeEdukasi'])->name('pemerintah.storeEdukasi');
    Route::get('/pemerintah/create', [EdukasiController::class, 'create'])->name('pemerintah.create');
});





Route::prefix('rw')->middleware(['auth', 'role:RW'])->group(function () {
Route::get('/dashboard', [RWController::class, 'dashboard'])->name('rw.dashboard');
Route::get('/lokasi', [RWController::class, 'kirimLokasiForm'])->name('rw.lokasi'); // Menampilkan form
Route::post('/lokasi', [RWController::class, 'PengangkutanDarurat'])->name('rw.lokasi.submit'); // Proses pengiriman data lokasi
Route::get('/jadwal', [RWController::class, 'jadwal'])->name('jadwal.store');
Route::get('/kritik-saran', [RWController::class, 'kritikSaranForm'])->name('rw.kritik-saran');
Route::post('/kritik-saran', [RWController::class, 'submitKritikSaran'])->name('rw.kritik-saran.submit');
Route::get('/rw/inbox', [RWController::class, 'inbox'])->name('rw.inbox');
Route::get('/logout', [PetugasController::class, 'logout'])->name('rw.logout');
Route::get('/jadwal', [RWController::class, 'index'])->name('rw.jadwal');
});





Route::prefix('petugas')->middleware(['auth', 'role:Petugas'])->group(function () {
    Route::get('/dashboard', [PetugasController::class, 'dashboard'])->name('petugas.dashboard');
    Route::get('/jadwalrute', [PetugasController::class, 'jadwalRute'])->name('petugas.jadwalrute');
    Route::get('/tambahlaporan/{jadwal_id}', [PetugasController::class, 'tambahlaporan'])->name('petugas.tambahlaporan');
    Route::post('/tambahlaporan', [PetugasController::class, 'tambahlaporansubmit'])->name('petugas.tambahlaporan.submit');
    Route::get('/laporantugas', [PetugasController::class, 'laporantugas'])->name('petugas.laporantugas');
    Route::get('/logout', [PetugasController::class, 'logout'])->name('petugas.logout');
});

//pengawasan tpa/tps

Route::get('/tpa-tps', function () {
    return view('Pengawasan_TPA_TPS.index');
});

Route::resource('kecamatan', PemerintahController::class);
Route::prefix('educations')->group(function () {
    // Menampilkan daftar edukasi
    Route::get('/', [EdukasiController::class, 'index'])->name('educations.index');

    // Menampilkan form tambah edukasi
    Route::get('/create', [EdukasiController::class, 'create'])->name('educations.create');

    // Menyimpan data edukasi ke database
    Route::post('/store', [EdukasiController::class, 'storeEdukasi'])->name('educations.store');

    // Menampilkan detail edukasi
    Route::get('/{id}', [EdukasiController::class, 'show'])->name('educations.show');

    // Mengunggah media (gambar/video)
    Route::post('/upload-media', [EdukasiController::class, 'uploadMedia'])->name('educations.uploadMedia');
});

Route::prefix('pemerintah/master-data')->group(function () {
    Route::get('/kelurahan', [MasterDataController::class, 'kelurahanindex'])->name('pemerintah.master_data.kelurahan.index');
    Route::get('/kelurahan/create', [MasterDataController::class, 'kelurahantambah'])->name('pemerintah.master_data.kelurahan.create');
    Route::post('/kelurahan', [MasterDataController::class, 'kelurahantambahSubmit'])->name('pemerintah.master_data.kelurahan.store');
    Route::get('/kelurahan/{id}/edit', [MasterDataController::class, 'kelurahanedit'])->name('pemerintah.master_data.kelurahan.edit');
    Route::put('/kelurahan/{id}', [MasterDataController::class, 'kelurahanupdate'])->name('pemerintah.master_data.kelurahan.update');
    Route::delete('/kelurahan/{id}', [MasterDataController::class, 'kelurahandelete'])->name('pemerintah.master_data.kelurahan.destroy');
});
