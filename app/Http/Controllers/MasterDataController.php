<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RW;

class MasterDataController extends Controller
{
    // Menampilkan daftar akun
    public function listrw()
    {
        $rws = RW::with('kelurahan.kecamatan')->get();
        return view('Pemerintah.Master_Data.RW.index', compact('rws'));
    }

    // Menampilkan halaman tambah akun
    public function tambahrw()
    {
        return view('Pemerintah.Master_Data_.RW.tambah');
    }


    // Menyimpan rw baru
    public function tambahrwSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'nama_rw' => 'required|string|max:255',
            'kelurahan_id' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        RW::create([
            'nama_rw' => $validatedData['nama_rw'],
            'kelurahan_id' => $validatedData['kelurahan_id'],
            'alamat_lengkap' => $validatedData['alamat_lengkap'],
            'lokasi' => $validatedData['lokasi'],
        ]);

        return redirect()->route('pemerintah.master_data.index-rw')->with('success', 'Akun berhasil ditambahkan.');
    }

    // Menampilkan halaman edit akun
    public function editAkun($id)
    {
        $rw = RW::findOrFail($id);
        return view('Pemerintah.Master_Data_.rw.update', compact('rw'));
    }
}
