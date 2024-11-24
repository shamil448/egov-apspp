<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Pastikan model User digunakan

class PemerintahController extends Controller
{
    // Menampilkan halaman dashboard
    public function dashboard()
    {
        return view('pemerintah.dashboard');
    }

    // Menampilkan halaman laporan harian
    public function laporanharian()
    {
        return view('pemerintah.laporanharian');
    }

    // Menampilkan halaman tambah akun
    public function tambahAkun()
    {
        return view('pemerintah.tambah-akun');
    }

    // Fungsi untuk menangani penambahan akun
    public function tambahAkunSubmit(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string|max:255',
            'nomor_kontak' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:Pemerintah,Petugas,RW',
        ]);

        // Simpan data ke database
        User::create([
            'name' => $validatedData['nama_lengkap'],
            'alamat' => $validatedData['alamat_lengkap'],
            'kontak' => $validatedData['nomor_kontak'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), // Hash password
            'role' => $validatedData['role'], // Simpan role
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Akun berhasil ditambahkan.');
    }

    // Menampilkan halaman tambah edukasi
    public function tambahEdukasi()
    {
        return view('pemerintah.tambahedukasi');
    }

    // Menampilkan halaman pengawasan TPA/TPS
    public function pengawasanTpaTps()
    {
        return view('pemerintah.tpatps');
    }

    // Menampilkan halaman pelaporan masyarakat
    public function pelaporan()
    {
        return view('pemerintah.pelaporan');
    }

    // Fungsi untuk logout
    public function logout()
    {
        // Tambahkan logika untuk logout di sini
        return redirect()->route('pemerintah.dashboard');
    }
}
