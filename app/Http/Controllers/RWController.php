<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message; // Asumsi model pesan bernama Message

class RWController extends Controller
{
    // Fungsi untuk menampilkan halaman dashboard RW
    public function dashboard()
    {
        return view('rw.dashboard'); // Mengembalikan view dashboard RW
    }

    // Fungsi untuk menampilkan form kirim lokasi
    public function kirimLokasiForm()
    {
        return view('rw.lokasi'); // Menampilkan form input lokasi
    }

    // Fungsi untuk menangani form kirim lokasi
    public function kirimLokasi(Request $request)
    {
        // Validasi data yang dikirim dari form
        $validated = $request->validate([
            'nama_perumahan' => 'required|string|max:255',
            'kirim_lokasi' => 'required|string|max:255',
            'nama_kecamatan' => 'required|string|max:255',
            'nama_kelurahan' => 'required|string|max:255',
        ]);

        // Proses data yang telah divalidasi (contoh: simpan ke database)
        // Contoh proses penyimpanan atau logika bisnis lainnya

        // Redirect ke halaman sukses atau dashboard RW
        return redirect()->route('rw.dashboard')->with('success', 'Lokasi berhasil dikirim!');
    }

    // Fungsi untuk menampilkan jadwal RW
    public function jadwal()
    {
        return view('rw.jadwal'); // Mengembalikan view jadwal RW
    }

    // Fungsi untuk menampilkan form Kritik & Saran
    public function kritikSaranForm()
    {
        return view('rw.kritik-saran'); // Mengembalikan view kritik & saran RW
    }

    // Fungsi untuk menangani form Kritik & Saran
    public function submitKritikSaran(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'kritik' => 'required|string',
            'saran' => 'nullable|string',
            'kepuasan' => 'required|integer|min:0|max:100',
        ]);

        // Proses data yang telah divalidasi (contoh: simpan ke database)
        // Contoh: Feedback::create($request->all());

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('rw.kritik-saran')->with('success', 'Kritik dan saran telah dikirim!');
    }

}