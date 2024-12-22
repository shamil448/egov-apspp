<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rw;
use App\Models\PetugasPengangkutan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemerintahController extends Controller
{
    // Menampilkan daftar akun
    public function listAkun(Request $request)
    {
        $role = $request->input('role');
        $users = User::when($role, function($query, $role) {
            return $query->where('role', $role);
        })->get();

        return view('Pemerintah.akun.index', compact('users'));
    }

    public function dashboard()
    {
        return view('Pemerintah.dashboard');
    }

    // Menampilkan halaman tambah akun
    public function tambahAkun()
    {
        return view('Pemerintah.akun.tambah-pemerintah');
    }

    // Menyimpan akun baru
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
        $user = User::findOrFail($id);
        return view('Pemerintah.akun.update', compact('user'));
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
        $rws = Rw::all();
        return view('Pemerintah.akun.tambah-rw', compact('rws'));
    }

    // Proses submit form tambah akun RW
    public function tambahAkunRWSubmit(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string|max:255',
            'nomor_kontak' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
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
        $petugas = PetugasPengangkutan::all();
        return view('Pemerintah.akun.tambah-petugas', compact('petugas'));
    }

    // Proses submit form tambah akun Petugas
    public function tambahAkunPetugasSubmit(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string|max:255',
            'nomor_kontak' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
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

    // Menampilkan laporan kritik&saran
    public function laporanKritikSaran()
    {
    return view('pemerintah.laporan-kritik-saran');
    }

    //menampilkan pengawasan tpa/tps
    public function pengawasanTpaTps()
    {
        return view('pemerintah.Pengawasan_TPA_TPS.index');
    }
}
