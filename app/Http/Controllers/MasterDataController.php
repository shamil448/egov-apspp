<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RW;
use App\Models\Kelurahan;

class MasterDataController extends Controller
{
    // Menampilkan daftar RW
    public function listrw()
    {
        $rws = RW::with('kelurahan.kecamatan')->orderBy('nama_rw', 'asc')->get();
        return view('Pemerintah.Master_Data.RW.index', compact('rws'));
    }

    // Menampilkan halaman tambah RW
    public function tambahrw()
    {
        $kelurahans = Kelurahan::with('kecamatan')->get();
        return view('Pemerintah.Master_Data.RW.tambah', compact('kelurahans'));
    }


    // Menyimpan rw baru
    public function tambahrwSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'rw' => 'required|integer|min:1',
            'kelurahan_id' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        // Format RW
        $nama_rw = $validatedData['nama_lengkap'] . '/RW' . str_pad($validatedData['rw'], 2, '0', STR_PAD_LEFT);

        RW::create([
            'nama_rw' => $nama_rw,
            'kelurahan_id' => $validatedData['kelurahan_id'],
            'alamat_lengkap' => $validatedData['alamat_lengkap'],
            'lokasi' => $validatedData['lokasi'],
        ]);

        return redirect()->route('pemerintah.master_data.index-rw')->with('success', 'Akun berhasil ditambahkan.');
    }

    // Menampilkan halaman edit RW
    public function editAkun($id)
    {
        $rw = RW::findOrFail($id);
        return view('Pemerintah.Master_Data_.rw.update', compact('rw'));
    }
}
