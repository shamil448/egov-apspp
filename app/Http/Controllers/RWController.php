<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengangkutanDarurat;
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
    public function PengangkutanDarurat(Request $request)
    {
        // Validasi input
        $request->validate([
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Validasi file gambar
            'nama_kecamatan' => 'required|string|max:255',
            'nama_kelurahan' => 'required|string|max:255',
            'kirim_lokasi' => 'required|string',
        ]);

        // Proses upload foto
        $fotoPath = $request->file('foto')->store('pengangkutan_darurat', 'public'); // Simpan di storage/public/uploads

        // Simpan data ke database
        PengangkutanDarurat::create([
            'foto' => $fotoPath,
            'nama_kecamatan' => $request->input('nama_kecamatan'),
            'nama_kelurahan' => $request->input('nama_kelurahan'),
            'kirim_lokasi' => $request->input('kirim_lokasi'),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('rw.lokasi')->with('success', 'Data pengangkutan darurat berhasil disimpan!');
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