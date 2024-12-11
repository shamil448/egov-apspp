<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
