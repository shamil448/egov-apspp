<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\TpaTps;
use App\Models\Kelurahan;
use App\Models\KritikSaranRw;
use App\Models\User;
use App\Models\Rw;
use App\Models\PengangkutanDarurat;
use App\Models\PetugasPengangkutan;
use App\Models\JadwalPengangkutan;
use App\Models\LaporanTugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemerintahController extends Controller
{
    // Menampilkan daftar akun
    public function listAkun(Request $request)
    {
        $user = Auth::user();
        $role = $request->input('role');
        $users = User::when($role, function($query, $role) {
            return $query->where('role', $role);
        })->get();

        return view('Pemerintah.akun.index', compact('users', 'user'));
    }

    public function dashboard()
    {
        $user = Auth::user();
        return view('Pemerintah.dashboard', compact('user'));
    }

    public function tambahAkun()
    {
        $user = Auth::user();
        return view('Pemerintah.akun.tambah-pemerintah', compact('user'));
    }

    public function tambahAkunSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string|max:255',
            'nomor_kontak' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:Pemerintah,Petugas,RW',
        ]);

        // Menyimpan akun
        $user = new User();
        $user->name = $validatedData['nama_lengkap'];
        $user->alamat = $validatedData['alamat_lengkap'];
        $user->kontak = $validatedData['nomor_kontak'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->role = $validatedData['role'];
        $user->save();

        return redirect()->route('pemerintah.index-akun')->with('success', 'Akun berhasil ditambahkan.');
    }

    // Menampilkan halaman edit akun
    public function editAkun($id)
    {
        $user = Auth::user();
        $user = User::findOrFail($id);
        $petugas = PetugasPengangkutan::all();
        $rws = RW::all();
        return view('Pemerintah.akun.update', compact('user', 'user', 'petugas', 'rws'));
    }

    // Memperbarui akun
    public function updateAkun(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'alamat_lengkap' => 'required|string|max:255',
        'nomor_kontak' => 'required|string|max:20',
        'email' => 'required|email|max:255|unique:users,email,' . $id,
        'role' => 'required|in:Pemerintah,Petugas,RW',
        'petugas_pengangkutan_id' => 'nullable|exists:petugas_pengangkutan,id',
        'rw_id' => 'nullable|exists:rw,id',
    ]);

    $user->name = $request->nama_lengkap;
    $user->alamat = $request->alamat_lengkap;
    $user->kontak = $request->nomor_kontak;
    $user->email = $request->email;
    $user->role = $request->role;

    if ($request->role == 'Petugas') {
        $user->petugas_pengangkutan_id = $request->petugas_pengangkutan_id;
        $user->rw_id = null; // Reset RW jika berganti role
    } elseif ($request->role == 'RW') {
        $user->rw_id = $request->rw_id;
        $user->petugas_pengangkutan_id = null; // Reset Petugas jika berganti role
    } else {
        $user->petugas_pengangkutan_id = null;
        $user->rw_id = null;
    }

    $user->save();

    return redirect()->route('pemerintah.index-akun')->with('success', 'Akun berhasil diperbarui.');
}
    // Menghapus akun
    public function deleteAkun($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('pemerintah.index-akun')->with('success', 'Akun berhasil dihapus.');
    }

    // Menampilkan form tambah akun RW
    public function tambahAkunRW()
    {
        $user = Auth::user();
        $rws = Rw::all();
        return view('Pemerintah.akun.tambah-rw', compact('rws', 'user'));
    }

    // Proses submit form tambah akun RW
    public function tambahAkunRWSubmit(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string|max:255',
            'nomor_kontak' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:Pemerintah,Petugas,RW',
            'rw_id' => 'required|exists:rw,id',
        ]);

        // Membuat akun RW
        $user = new User();
        $user->name = $request->nama_lengkap;
        $user->alamat = $request->alamat_lengkap;
        $user->kontak = $request->nomor_kontak;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'RW';
        $user->rw_id = $request->rw_id;
        $user->save();

        return redirect()->route('pemerintah.index-akun')->with('success', 'Akun RW berhasil ditambahkan');
    }

    // Menampilkan form tambah akun Petugas
    public function tambahAkunPetugas()
    {
        $user = Auth::user();
        $petugas = PetugasPengangkutan::all();
        return view('Pemerintah.akun.tambah-petugas', compact('petugas', 'user'));
    }

    // Proses submit form tambah akun Petugas
    public function tambahAkunPetugasSubmit(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string|max:255',
            'nomor_kontak' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:Pemerintah,Petugas,RW',
            'petugas_pengangkutan_id' => 'required|exists:petugas_pengangkutan,id',
        ]);

        // Membuat akun Petugas
        $user = new User();
        $user->name = $request->nama_lengkap;
        $user->alamat = $request->alamat_lengkap;
        $user->kontak = $request->nomor_kontak;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'Petugas';
        $user->petugas_pengangkutan_id = $request->petugas_pengangkutan_id;
        $user->save();

        return redirect()->route('pemerintah.index-akun')->with('success', 'Akun Petugas berhasil ditambahkan');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function listjadwal()
    {
        $user = Auth::user();
        $jadwal = JadwalPengangkutan::with('rw.kelurahan.kecamatan','petugas.kecamatan')->orderBy('hari', 'asc')->get();
        return view('Pemerintah.jadwal.index', compact('jadwal', 'user'));
    }
    public function tambahjadwal()
    {
        $user = Auth::user();
        $jadwal = RW::with('kelurahan')->get();
        $jadwals = PetugasPengangkutan::with('kecamatan')->get();
        return view('Pemerintah.jadwal.tambah', compact('jadwal','jadwals', 'user'));
    }

    public function tambahjadwalSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'hari' => 'required|string|max:255',
            'rw_id' => 'required|integer|min:1',
            'petugas_id' => 'required|integer|min:1',
        ]);

        JadwalPengangkutan::create([
            'hari' => $validatedData['hari'],
            'rw_id' => $validatedData['rw_id'],
            'petugas_id' => $validatedData['petugas_id'],
        ]);

        return redirect()->route('pemerintah.index-jadwal')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function editjadwal($id)
        {
            $user = Auth::user();
            $jadwal = JadwalPengangkutan::findOrFail($id);
            $rw = Rw::with('kelurahan')->get();
            $petugas = PetugasPengangkutan::with('kecamatan')->get();
            return view('Pemerintah.jadwal.update', compact('jadwal','rw','petugas', 'user'));
        }
    
    public function updatejadwal(Request $request, $id)
        {
            $validatedData = $request->validate([
                'hari' => 'required|string|max:255',
                'rw_id' => 'required|integer|min:1',
                'petugas_id' => 'required|integer|min:1',
            ]);

            $jadwal = JadwalPengangkutan::findOrFail($id);
            $jadwal->update([
                'hari' => $validatedData['hari'],
                'rw_id' => $validatedData['rw_id'],
                'petugas_id' => $validatedData['petugas_id'],

                
            ]);

            return redirect()->route('pemerintah.index-jadwal')->with('success', 'Data Jadwal berhasil diperbarui.');
        }
    
        public function deletejadwal($id)
        {
            $jadwal = JadwalPengangkutan::findOrFail($id);
            $jadwal->delete();

            return redirect()->route('pemerintah.index-jadwal')->with('success', 'Jadwal berhasil dihapus.');
        }



    // Menampilkan laporan kritik&saran
    public function laporanKritikSaran()
    {
        $user = Auth::user();
        $kritikSaran = KritikSaranRw::all();
        return view('pemerintah.laporan.kritik-saran', compact('user', 'kritikSaran'));
    }
    public function kelurahan()
    {
        $user = Auth::user();
        $kelurahans = Kelurahan::with('kecamatan')->get();
        $kecamatan = Kecamatan::all(); // Ambil semua data kecamatan

        return view('Pemerintah.Master_Data.Kelurahan.index', compact('kelurahans', 'kecamatan', 'user'));
    }

    // Menampilkan halaman tambah kelurahan
    public function tambahKelurahan()
    {
        $user = Auth::user();
        $kecamatan = Kecamatan::all();
        return view('Pemerintah.Master_Data.Kelurahan.create', compact('kecamatan', 'user'));
    }

    // Menangani submit form tambah kelurahan
    public function tambahKelurahanSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'kelurahan' => 'required|string|max:255',
            'kecamatan_id' => 'required|exists:kecamatan,id',
        ]);

        Kelurahan::create([
            'kelurahan' => $validatedData['kelurahan'],
            'kecamatan_id' => $validatedData['kecamatan_id'],
        ]);

        return redirect()->route('pemerintah.master_data.kelurahan.index')->with('success', 'Kelurahan berhasil ditambahkan.');
    }


    public function editKelurahan($id)
    {
        $user = Auth::user();
        $kelurahan = Kelurahan::findOrFail($id);
        $kecamatan = Kecamatan::all();
        return view('Pemerintah.Master_Data.Kelurahan.edit', compact('kelurahan', 'kecamatan', 'user'));
    }

    public function updateKelurahan(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kelurahan' => 'required|string|max:255',
            'kecamatan_id' => 'required|exists:kecamatan,id',
        ]);

        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->update([
            'kelurahan' => $validatedData['kelurahan'],
            'kecamatan_id' => $validatedData['kecamatan_id'],
        ]);

        return redirect()->route('pemerintah.master_data.index-kelurahan')->with('success', 'Kelurahan berhasil diperbarui.');
    }

    public function deleteKelurahan($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->delete();

        return redirect()->route('kelurahan.index')->with('success', 'Kelurahan berhasil dihapus.');

    }
public function TpaTpsindex()
{
    $user = Auth::user();
    $TpaTps = TpaTps::all();
    return view('pemerintah.Lokasi_TpaTps.index', compact('user', 'TpaTps'));
}

public function TpaTpscreate()
{
    $user = Auth::user();
    $TpaTps = TpaTps::all();
    return view('pemerintah.Lokasi_TpaTps.tambah', compact('user','TpaTps'));
}

public function TpaTpsstore(Request $request)
{
    $validatedData = $request->validate([
        'kategori' => 'required|in:TPA,TPS',
        'alamat_lengkap' => 'required|string|max:255',
        'lokasi' => 'required|string|max:255',
    ]);

    TpaTps::create($validatedData);

    return redirect()->route('pemerintah.tpa_tps')->with('success', 'Data TPA/TPS berhasil ditambahkan.');
}

public function TpaTpsedit($id)
{
    $user = Auth::user();
    $TpaTps = TpaTps::findOrFail($id);
    return view('pemerintah.Lokasi_TpaTps.edit', compact('user', 'TpaTps'));
}

public function TpaTpsupdate(Request $request, $id)
{
    $validatedData = $request->validate([
        'kategori' => 'required|in:TPA,TPS',
        'alamat_lengkap' => 'required|string|max:255',
        'lokasi' => 'required|string|max:255',
    ]);

    $TpaTps = TpaTps::findOrFail($id);
    $TpaTps->update($validatedData);

    return redirect()->route('pemerintah.tpa_tps')->with('success', 'Data TPA/TPS berhasil diperbarui.');
}

public function TpaTpsdestroy($id)
{
    $TpaTps = TpaTps::findOrFail($id);
    $TpaTps->delete();

    return redirect()->route('pemerintah.tpa_tps')->with('success', 'Data TPA/TPS berhasil dihapus.');
}

public function laporantugas()
{
    $user = Auth::user();
    $laporan = LaporanTugas::with('jadwalpengangkutan.petugas')->get();
    return view('pemerintah.laporan.laporantugas', compact('laporan', 'user'));
}

public function showPengangkutanRequest($id)
{
    // Data pengangkutan darurat berdasarkan ID
    $pengangkutanDarurat = PengangkutanDarurat::with('rw.kelurahan.kecamatan')->findOrFail($id);
    $user = Auth::user();

    // Ambil kecamatan terkait
    $kecamatanId = $pengangkutanDarurat->rw->kelurahan->kecamatan->id;

    // Ambil petugas terkait kecamatan
    $petugas = User::where('role', 'petugas')
        ->whereHas('petugasPengangkutan', function ($query) use ($kecamatanId) {
            $query->where('kecamatan_id', $kecamatanId); // Filter petugas berdasarkan kecamatan_id
        })
        ->get();

    return view('pemerintah.laporan.pengangkutan-darurat-request', compact('pengangkutanDarurat', 'petugas', 'user'));
}

public function assignPetugas(Request $request, $id)
{
    $request->validate([
        'petugas_id' => 'required|exists:users,id',
    ]);

    // Ambil data pengangkutan darurat berdasarkan ID
    $pengangkutanDarurat = PengangkutanDarurat::findOrFail($id);

    // Assign petugas_id dan ubah status pengangkutan darurat
    $pengangkutanDarurat->petugas_id = $request->petugas_id;
    $pengangkutanDarurat->status = 'Progress'; // Mengubah status pengangkutan darurat
    $pengangkutanDarurat->save();

    return redirect()->route('pemerintah.pengangkutan-darurat')
        ->with('success', 'Petugas berhasil ditugaskan untuk pengangkutan darurat.');
}

public function listPengangkutanDarurat()
{
    $user = Auth::user();
    // Mengambil semua data pengangkutan darurat dengan relasi rw, kelurahan, dan kecamatan
    $pengangkutanDarurat = PengangkutanDarurat::with('rw.kelurahan.kecamatan')->get();
    return view('pemerintah.laporan.pengangkutan-darurat', compact('pengangkutanDarurat', 'user'));
}

public function updateStatusRequest(Request $request, $id)
{
    $request->validate([
        'petugas_pengangkutan_id' => 'required|exists:users,id',
    ]);

    // Ambil data pengangkutan darurat berdasarkan ID
    $pengangkutanDarurat = PengangkutanDarurat::findOrFail($id);

    // Mengubah status dan menugaskan petugas
    $pengangkutanDarurat->status = 'Progress';
    $pengangkutanDarurat->petugas_pengangkutan_id = $request->petugas_pengangkutan_id;
    $pengangkutanDarurat->save();

    return redirect()->route('pemerintah.pengangkutan-darurat')
        ->with('success', 'Tugas berhasil diberikan kepada petugas.');
}

}
