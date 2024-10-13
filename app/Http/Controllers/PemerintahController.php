<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemerintahController extends Controller
{
    // Menampilkan halaman dashboard
    public function dashboard() {
        return view('pemerintah.dashboard');
    }

    // Menampilkan halaman laporan harian
    public function laporanharian() {
        return view('pemerintah.laporanharian');
    }

    // Menampilkan halaman tambah akun
    public function tambahAkun() {
        return view('pemerintah.tambahakun');
    }

    // Menampilkan halaman tambah edukasi
    public function tambahEdukasi() {
        return view('pemerintah.tambahedukasi');
    }

    // Menampilkan halaman pengawasan TPA/TPS
    public function pengawasanTpaTps() {
        return view('pemerintah.tpatps');
    }

    // Menampilkan halaman pelaporan masyarakat
    public function pelaporan() {
        return view('pemerintah.pelaporan');
    }

    // Fungsi untuk logout
    public function logout() {
        // Tambahkan logika untuk logout di sini
        return redirect()->route('pemerintah.dashboard');
    }
}