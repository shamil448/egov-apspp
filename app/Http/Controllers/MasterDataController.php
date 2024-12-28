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
        public function editrw($id)
        {
            $rw = RW::findOrFail($id);
            $kelurahans = Kelurahan::with('kecamatan')->get();
            return view('Pemerintah.Master_Data.RW.update', compact('rw','kelurahans'));
        }

        // Update data rw
        public function updaterw(Request $request, $id)
        {
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

            return redirect()->route('pemerintah.master_data.index-rw')->with('success', 'Data rw berhasil diperbarui.');
        }
        public function deleterw($id)
        {
            $rw = RW::findOrFail($id);
            $rw->delete();

            return redirect()->route('pemerintah.master_data.index-rw')->with('success', 'rw berhasil dihapus.');
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
        $petugas = PetugasPengangkutan::findOrFail($id);
        $kecamatans = Kecamatan::all();
        return view('Pemerintah.Master_Data.Petugas.update', compact('petugas', 'kecamatans'));
    }

    // Update data petugas
    public function updatePetugas(Request $request, $id)
    {
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
        $petugas = PetugasPengangkutan::findOrFail($id);
        $petugas->delete();

        return redirect()->route('pemerintah.master_data.index-petugas')->with('success', 'Petugas berhasil dihapus.');
    }

    // Menampilkan daftar kecamatan
    public function index()
    {
        $kecamatan = Kecamatan::all();
        return view('Pemerintah.Master_Data.Kecamatan.index', compact('kecamatan'));
    }

    // Menampilkan halaman tambah kecamatan
    public function create()
    {
        return view('Pemerintah.Master_Data.Kecamatan.create');
    }

    // Menyimpan kecamatan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kecamatan' => 'required|string|max:255',
        ]);

        Kecamatan::create($validated);

        return redirect()->route('pemerintah.master_data.index-kecamatan')->with('success', 'Kecamatan berhasil ditambahkan.');
    }

    // Menampilkan detail kecamatan
    public function show($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        return view('Pemerintah.Master_Data.Kecamatan.show', compact('kecamatan'));
    }

    // Menampilkan halaman edit kecamatan
    public function edit($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        return view('Pemerintah.Master_Data.Kecamatan.edit', compact('kecamatan'));
    }

    // Memperbarui data kecamatan
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_kecamatan' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:10',
            'keterangan' => 'nullable|string|max:500',
        ]);

        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->update([
            'nama_kecamatan' => $validatedData['nama_kecamatan'],
            'kode_pos' => $validatedData['kode_pos'],
            'keterangan' => $validatedData['keterangan'],
        ]);

        return redirect()->route('pemerintah.master_data.index-kecamatan')->with('success', 'Kecamatan berhasil diperbarui.');
    }

    // Menghapus data kecamatan
    public function destroy($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->delete();

        return redirect()->route('pemerintah.master_data.index-kecamatan')->with('success', 'Kecamatan berhasil dihapus.');
    }
}
