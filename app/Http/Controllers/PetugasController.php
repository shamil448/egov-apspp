<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function dashboard()
    {
        // Logika untuk menampilkan halaman dashboard
        return view('petugas.dashboard');
    }

    public function jadwalRute()
    {
        // Logika untuk menampilkan halaman Jadwal dan Rute
        return view('petugas.jadwalrute');
    }

    public function laporanTugas()
    {
        // Logika untuk menampilkan halaman Laporan Tugas
        return view('petugas.LaporanTugas');
    }
}
