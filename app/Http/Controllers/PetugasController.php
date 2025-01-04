<?php

namespace App\Http\Controllers;

use App\Models\JadwalPengangkutan;
use App\Models\LaporanTugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class PetugasController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        return view('petugas.dashboard', compact('user'));
    }

    public function jadwalRute()
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Pastikan user memiliki relasi ke model PetugasPengangkutan
        $petugas = $user->petugasPengangkutan;

        // Jika user bukan petugas, beri respon error atau redirect
        if (!$petugas) {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses ke jadwal pengangkutan.');
        }

        // Ambil jadwal pengangkutan berdasarkan petugas yang login
        $jadwal = JadwalPengangkutan::with('rw.kelurahan.kecamatan')
            ->where('petugas_id', $petugas->id)
            ->orderByRaw("FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu')")
            ->get();

        // Kirim data ke view
        return view('petugas.jadwalrute', compact('jadwal', 'user'));
    }

    public function tambahlaporan($jadwal_id)
    {
        $user = Auth::user();
        $jadwal = JadwalPengangkutan::with('rw.kelurahan.kecamatan')->findOrFail($jadwal_id);
        return view('petugas.tambahlaporan', compact('jadwal', 'user'));
    }

    public function tambahlaporansubmit(Request $request)
    {
        $request->validate([
            'jadwalpengangkutan_id' => 'required|exists:jadwal_pengangkutan,id',
            'catatan' => 'required|string',
            'foto' => 'required|array|min:3',
            'foto.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan laporan
        $laporan = new LaporanTugas();
        $laporan->jadwalpengangkutan_id = $request->jadwalpengangkutan_id;
        $laporan->status_pengangkutan = 'Pending';
        $laporan->catatan = $request->catatan;

        // Upload foto
        $fotoPaths = [];
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                $path = $file->store('laporanpengangkutan', 'public'); // Simpan di folder storage/public/laporan
                $fotoPaths[] = basename($path);
            }
        }

        $laporan->foto = $fotoPaths; // Simpan path sebagai JSON di kolom database
        $laporan->save();

        return redirect()->route('petugas.jadwalrute')->with('success', 'Laporan berhasil disimpan.');
    }

    public function laporantugas()
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Pastikan user memiliki relasi ke model PetugasPengangkutan
        $petugas = $user->petugasPengangkutan;

        // Jika user bukan petugas, beri respon error atau redirect
        if (!$petugas) {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses ke laporan tugas.');
        }

        // Ambil laporan tugas berdasarkan petugas yang login, menggunakan jadwal
        $laporan = LaporanTugas::with('jadwalpengangkutan.rw.kelurahan.kecamatan')
            ->whereHas('jadwalpengangkutan', function($query) use ($petugas) {
                $query->where('petugas_id', $petugas->id);
            })
            ->orderBy('created_at', 'desc') // Mengurutkan berdasarkan waktu dibuat
            ->get();

        // Kirim data ke view
        return view('petugas.laporantugas', compact('laporan', 'user'));
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}