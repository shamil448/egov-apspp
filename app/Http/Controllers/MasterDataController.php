<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RW;
use App\Models\Kelurahan;
use App\Models\PetugasPengangkutan;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\Auth;

class MasterDataController extends Controller
{
    // Menampilkan daftar RW
    public function listrw()
    {
        $user = Auth::user();
        $rws = RW::with('kelurahan.kecamatan')->orderBy('nama_rw', 'asc')->get();
        return view('Pemerintah.Master_Data.RW.index', compact('rws', 'user'));
    }

    // Menampilkan halaman tambah RW
    public function tambahrw()
    {
        $user = Auth::user();
        $kelurahans = Kelurahan::with('kecamatan')->get();
        return view('Pemerintah.Master_Data.RW.tambah', compact('kelurahans', 'user'));
    }

    // Menyimpan rw baru
    public function tambahrwSubmit(Request $request)
    {
        $user = Auth::user();
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
    public function editrw($id)
    {
        $user = Auth::user();
        $rw = RW::findOrFail($id);
        $kelurahans = Kelurahan::with('kecamatan')->get();
        return view('Pemerintah.Master_Data.RW.update', compact('rw', 'kelurahans', 'user'));
    }

    // Update data RW
    public function updaterw(Request $request, $id)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'nama_rw' => 'required|string|max:255',
            'kelurahan_id' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        $rw = RW::findOrFail($id);
        $rw->update([
            'nama_rw' => $validatedData['nama_rw'],
            'kelurahan_id' => $validatedData['kelurahan_id'],
            'alamat_lengkap' => $validatedData['alamat_lengkap'],
            'lokasi' => $validatedData['lokasi'],
        ]);

        return redirect()->route('pemerintah.master_data.index-rw')->with('success', 'Data RW berhasil diperbarui.');
    }

    // Menghapus data RW
    public function deleterw($id)
    {
        $user = Auth::user();
        $rw = RW::findOrFail($id);
        $rw->delete();

        return redirect()->route('pemerintah.master_data.index-rw')->with('success', 'RW berhasil dihapus.');
    }

    // Menampilkan daftar petugas
    public function listPetugas()
    {
        $user = Auth::user();
        $petugas = PetugasPengangkutan::with('kecamatan')->orderBy('nama_petugas', 'asc')->get();
        return view('Pemerintah.Master_Data.Petugas.index', compact('petugas', 'user'));
    }

    // Menampilkan form tambah petugas
    public function tambahPetugas()
    {
        $user = Auth::user();
        $kecamatans = Kecamatan::all();
        return view('Pemerintah.Master_Data.Petugas.tambah', compact('kecamatans', 'user'));
    }

    // Menyimpan data petugas baru
    public function tambahPetugasSubmit(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'petugas' => 'required|integer|min:1',
            'kecamatan_id' => 'required|exists:kecamatan,id',
        ]);

        // Format Nama Petugas
        $nama_petugas = $validatedData['nama_lengkap'] . '/Petugas' . str_pad($validatedData['petugas'], 2, '0', STR_PAD_LEFT);

        PetugasPengangkutan::create([
            'nama_petugas' => $nama_petugas,
            'kecamatan_id' => $validatedData['kecamatan_id'],
        ]);

        return redirect()->route('pemerintah.master_data.tambah-petugas')->with('success', 'Petugas berhasil ditambahkan.');
    }

    // Menampilkan halaman edit petugas
    public function editPetugas($id)
    {
        $user = Auth::user();
        $petugas = PetugasPengangkutan::findOrFail($id);
        $kecamatans = Kecamatan::all();
        return view('Pemerintah.Master_Data.Petugas.update', compact('petugas', 'kecamatans', 'user'));
    }

    // Update data petugas
    public function updatePetugas(Request $request, $id)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'kecamatan_id' => 'required|exists:kecamatan,id',
        ]);

        $petugas = PetugasPengangkutan::findOrFail($id);
        $petugas->update([
            'nama_petugas' => $validatedData['nama_lengkap'],
            'kecamatan_id' => $validatedData['kecamatan_id'],
        ]);

        return redirect()->route('pemerintah.master_data.index-petugas')->with('success', 'Data petugas berhasil diperbarui.');
    }

    // Menghapus data petugas
    public function deletePetugas($id)
    {
        $user = Auth::user();
        $petugas = PetugasPengangkutan::findOrFail($id);
        $petugas->delete();

        return redirect()->route('pemerintah.master_data.index-petugas')->with('success', 'Petugas berhasil dihapus.');
    }

    // Menampilkan daftar kecamatan
    public function kecamatanindex()
    {
        $user = Auth::user();
        $kecamatan = Kecamatan::all();
        return view('Pemerintah.Master_Data.Kecamatan.index', compact('kecamatan', 'user'));
    }

    // Menampilkan halaman tambah kecamatan
    public function kecamatancreate()
    {
        $user = Auth::user();
        return view('Pemerintah.Master_Data.Kecamatan.tambah', compact('user'));
    }

    // Menyimpan kecamatan baru
    public function kecamatanstore(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'nama_kecamatan' => 'required|string|max:255',
        ]);

        Kecamatan::create($validated);

        return redirect()->route('pemerintah.master_data.index-kecamatan')->with('success', 'Kecamatan berhasil ditambahkan.');
    }
    // Menampilkan halaman edit kecamatan
    public function kecamatanedit($id)
    {
        $user = Auth::user();
        $kecamatan = Kecamatan::findOrFail($id);
        return view('Pemerintah.Master_Data.Kecamatan.edit', compact('kecamatan', 'user'));
    }

    // Memperbarui data kecamatan
    public function kecamatanupdate(Request $request, $id)
{
    $user = Auth::user();
    $validatedData = $request->validate([
        'nama_kecamatan' => 'required|string|max:255',
    ]);

    $kecamatan = Kecamatan::findOrFail($id);
    $kecamatan->update([
        'nama_kecamatan' => $validatedData['nama_kecamatan'],
    ]);

    return redirect()->route('pemerintah.master_data.index-kecamatan')->with('success', 'Kecamatan berhasil diperbarui.');
}

    // Menghapus data kecamatan
    public function kecamatandestroy($id)
    {
        $user = Auth::user();
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->delete();

        return redirect()->route('pemerintah.master_data.index-kecamatan')->with('success', 'Kecamatan berhasil dihapus.');
    }
    public function kelurahanindex()
    {
        $user = Auth::user();
        $kelurahan = Kelurahan::with('kecamatan')->get();
        return view('Pemerintah.Master_Data.Kelurahan.index', compact('kelurahan', 'user'));
    }

    public function kelurahantambah()
    {
        $user = Auth::user();
        $kecamatan = Kecamatan::all();
        return view('Pemerintah.Master_Data.Kelurahan.tambah', compact('kecamatan', 'user'));
    }

    public function kelurahantambahSubmit(Request $request)
    {
        $validated = $request->validate([
            'kelurahan' => 'required|string|max:255',
            'kecamatan_id' => 'required|exists:kecamatan,id',
        ]);

        Kelurahan::create($validated);

        return redirect()->route('pemerintah.master_data.kelurahan.index')->with('success', 'Kelurahan berhasil ditambahkan.');
    }

    public function kelurahanedit($id)
    {
        $user = Auth::user();
        $kelurahan = Kelurahan::findOrFail($id);
        $kecamatan = Kecamatan::all();
        return view('Pemerintah.Master_Data.Kelurahan.edit', compact('kelurahan', 'kecamatan', 'user'));
    }

    public function kelurahanupdate(Request $request, $id)
    {
        $validated = $request->validate([
            'kelurahan' => 'required|string|max:255',
            'kecamatan_id' => 'required|exists:kecamatan,id',
        ]);

        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->update($validated);

        return redirect()->route('pemerintah.master_data.kelurahan.index')->with('success', 'Kelurahan berhasil diperbarui.');
    }

    public function kelurahandelete($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->delete();

        return redirect()->route('pemerintah.master_data.kelurahan.index')->with('success', 'Kelurahan berhasil dihapus.');
    }
}
