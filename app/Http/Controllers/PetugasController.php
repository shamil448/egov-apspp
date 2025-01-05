<?php

namespace App\Http\Controllers;

use App\Models\JadwalPengangkutan;
use App\Models\PengangkutanDarurat;
use App\Models\LaporanPengangkutanDarurat;
use App\Models\User;
use App\Models\LaporanTugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class PetugasController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $petugas = $user->petugasPengangkutan;

    if (!$petugas) {
        return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses ke jadwal pengangkutan.');
    }

    $hariIni = Carbon::now()->translatedFormat('l'); // Mengambil nama hari sekarang (Senin, Selasa, dll.)

    // Mendapatkan jadwal berdasarkan hari ini
    $jadwalHariIni = JadwalPengangkutan::with('rw.kelurahan.kecamatan')
        ->where('petugas_id', $petugas->id) // Filter berdasarkan petugas
        ->where('hari', $hariIni)           // Filter berdasarkan hari sekarang
        ->orderBy('hari', 'asc')          // Mengurutkan berdasarkan waktu
        ->get();

    $laporanselesai = LaporanTugas::whereHas('jadwalpengangkutan', function ($query) use ($petugas) {
            $query->where('petugas_id', $petugas->id);
        })->where('status_pengangkutan', 'Disetujui')->count();

    $laporanpending = LaporanTugas::whereHas('jadwalpengangkutan', function ($query) use ($petugas) {
            $query->where('petugas_id', $petugas->id);
        })->where('status_pengangkutan', 'Pending')->count();

    

    return view('petugas.dashboard', compact('jadwalHariIni', 'hariIni', 'petugas', 'laporanselesai', 'laporanpending', 'user'));
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
    public function index()
    {
        $pengangkutanDarurat = PengangkutanDarurat::with(['rw.kelurahan.kecamatan'])->get();
        return view('petugas.laporan-pengangkutan-darurat', compact('pengangkutanDarurat'));
    }

    /**
     * Menampilkan form tambah laporan.
     */
    public function create($id)
    {
        $pengangkutanDarurat = PengangkutanDarurat::findOrFail($id);
        return view('petugas.laporan-pengangkutan-darurat-tambah', compact('pengangkutanDarurat'));
    }

    /**
     * Menyimpan laporan pengangkutan darurat.
     */
    public function store(Request $request)
{
    $request->validate([
        'pengangkutan_darurat_id' => 'required|exists:pengangkutan_darurat,id',
        'catatan' => 'required|string',
        'foto' => 'required|array|min:3',
        'foto.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Menemukan pengangkutan darurat berdasarkan ID
    $pengangkutanDarurat = PengangkutanDarurat::findOrFail($request->pengangkutan_darurat_id);

    // Membuat laporan pengangkutan darurat baru
    $laporanPengangkutanDarurat = new LaporanPengangkutanDarurat();
    $laporanPengangkutanDarurat->pengangkutan_darurat_id = $pengangkutanDarurat->id;
    $laporanPengangkutanDarurat->catatan = $request->catatan;

    // Proses upload foto
    $fotoPaths = [];
    if ($request->hasFile('foto')) {
        foreach ($request->file('foto') as $foto) {
            $path = $foto->store('pengangkutan_darurat', 'public');
            $fotoPaths[] = $path;
        }
    }

    // Menyimpan path foto sebagai JSON
    $laporanPengangkutanDarurat->foto = json_encode($fotoPaths);

    // Simpan laporan
    $laporanPengangkutanDarurat->save();

    // Perbarui status pengangkutan darurat menjadi "Done"
    $pengangkutanDarurat->status = 'Done';
    $pengangkutanDarurat->save();

    // Redirect setelah berhasil
    return redirect()->route('petugas.pengangkutan-darurat')
                     ->with('success', 'Laporan berhasil dikirim dan status diperbarui menjadi "Done".');
}

    /**
     * Memperbarui status pengangkutan menjadi "Done".
     */
    public function updateStatus($id)
{
    // Temukan data pengangkutan darurat
    $pengangkutanDarurat = PengangkutanDarurat::findOrFail($id);

    // Pastikan status sebelumnya adalah "Progress" sebelum diubah menjadi "Done"
    if ($pengangkutanDarurat->status === 'Progress') {
        // Update status menjadi "Done"
        $pengangkutanDarurat->update(['status' => 'Done']);
        return redirect()->route('petugas.pengangkutan-darurat')
                         ->with('success', 'Status berhasil diperbarui menjadi "Done".');
    }

    return redirect()->route('petugas.pengangkutan-darurat')
                     ->with('error', 'Hanya pengangkutan dengan status "Progress" yang dapat diperbarui.');
}
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}