<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PemerintahController extends Controller
{
    // Menampilkan daftar akun
    public function listAkun()
    {
        $users = User::all();
        return view('Pemerintah.akun.index', compact('users'));
    }

    public function dashboard()
    {
        return view('Pemerintah.dashboard');
    }

    // Menampilkan halaman tambah akun
    public function tambahAkun()
    {
        return view('Pemerintah.akun.tambah');
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

        User::create([
            'name' => $validatedData['nama_lengkap'],
            'alamat' => $validatedData['alamat_lengkap'],
            'kontak' => $validatedData['nomor_kontak'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => $validatedData['role'],
        ]);

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

        return redirect()->route('pemerintah.update-akun')->with('success', 'Akun berhasil diperbarui.');
    }

    // Menghapus akun
    public function deleteAkun($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('pemerintah.index-akun')->with('success', 'Akun berhasil dihapus.');
    }
}
