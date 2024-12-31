<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\User;
use App\Models\Rw;
use App\Models\PetugasPengangkutan;
use App\Models\JadwalPengangkutan;
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
        return view('Pemerintah.akun.update', compact('user', 'user'));
    }

    // Memperbarui akun
    public function updateAkun(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string|max:255',
            'nomor_kontak' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
            'role' => 'required|in:Pemerintah,Petugas,RW',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $validatedData['nama_lengkap'],
            'alamat' => $validatedData['alamat_lengkap'],
            'kontak' => $validatedData['nomor_kontak'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'] ? bcrypt($validatedData['password']) : $user->password,
            'role' => $validatedData['role'],
        ]);

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
            'rw_id' => 'required|exists:rws,id',
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
        return view('pemerintah.laporan-kritik-saran', compact('user'));
    }

    //menampilkan pengawasan tpa/tps
    public function pengawasanTpaTps()
    {
        $user = Auth::user();
        return view('pemerintah.Pengawasan_TPA_TPS.index', compact('user'));
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
}
