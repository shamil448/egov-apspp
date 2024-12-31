<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetugasController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        return view('petugas.dashboard', compact('user'));
    }

    public function jadwalRute()
    {
        $user = Auth::user();
        return view('petugas.jadwalrute', compact('jadwalRute', 'user'));
    }

    public function laporanTugas()
    {
        $user = Auth::user();
        return view('petugas.laporantugas', compact('laporanTugas', 'user'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
