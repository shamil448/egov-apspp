<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RW;
use App\Models\Kelurahan;
use App\Models\PetugasPengangkutan;
use App\Models\Kecamatan;

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
        return view('Pemerintah.Master_Data.RW.update', compact('rw'));
    }

    // Menampilkan daftar petugas
    public function listPetugas()
    {
        $petugas = PetugasPengangkutan::with('kecamatan')->orderBy('nama_petugas', 'asc')->get();
        return view('Pemerintah.Master_Data.Petugas.index', compact('petugas'));
    }

    // Menampilkan form tambah petugas
    public function tambahPetugas()
    {
        $kecamatans = Kecamatan::all();
        return view('Pemerintah.Master_Data.Petugas.tambah', compact('kecamatans'));
    }

    // Menyimpan data petugas baru
    public function tambahPetugasSubmit(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'kecamatan_id' => 'required|exists:kecamatan,id', // Pastikan menggunakan tabel "kecamatan"
        ]);

        PetugasPengangkutan::create([
            'nama_petugas' => $request->input('nama_lengkap'),
            'kecamatan_id' => $request->input('kecamatan_id'),
        ]);

        return redirect()->route('pemerintah.master_data.tambah-petugas')->with('success', 'Petugas berhasil ditambahkan.');
    }

    // Menampilkan halaman edit petugas
    public function editPetugas($id)
    {
        $petugas = PetugasPengangkutan::findOrFail($id);
        $kecamatans = Kecamatan::all();
        return view('Pemerintah.Master_Data.Petugas.update', compact('petugas', 'kecamatans'));
    }

    // Update data petugas
    public function updatePetugas(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'kecamatan_id' => 'required|exists:kecamatan,id', // Pastikan menggunakan tabel "kecamatan"
        ]);

        $petugas = PetugasPengangkutan::findOrFail($id);
        $petugas->update([
            'nama_petugas' => $validated['nama_lengkap'],
            'kecamatan_id' => $validated['kecamatan_id'],
        ]);

        return redirect()->route('pemerintah.master_data.index-petugas')->with('success', 'Data petugas berhasil diperbarui.');
    }
    public function deletePetugas($id)
{
    $petugas = PetugasPengangkutan::findOrFail($id);
    $petugas->delete();

    return redirect()->route('pemerintah.master_data.index-petugas')->with('success', 'Petugas berhasil dihapus.');
}
}
