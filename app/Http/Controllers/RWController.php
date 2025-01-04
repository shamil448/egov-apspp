<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengangkutanDarurat;
use App\Models\JadwalPengangkutan;
use App\Models\KritikSaranRw;
use App\Models\LaporanTugas;
use Illuminate\Support\Facades\Auth;

class RWController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $rw = $user->rw;

        if (!$rw) {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses ke jadwal pengangkutan.');
        }

        $jadwal = JadwalPengangkutan::with('rw.kelurahan.kecamatan')
            ->where('rw_id', $rw->id)
            ->orderBy('hari', 'asc')
            ->get();

        $pendingCount = LaporanTugas::whereHas('jadwalpengangkutan', function ($query) use ($rw) {
            $query->where('rw_id', $rw->id);
        })->where('status_pengangkutan', 'Pending')->count();

        $approvedCount = LaporanTugas::whereHas('jadwalpengangkutan', function ($query) use ($rw) {
            $query->where('rw_id', $rw->id);
        })->where('status_pengangkutan', 'Disetujui')->count();

        return view('rw.dashboard', compact('jadwal', 'pendingCount', 'approvedCount', 'user'));
    }
    public function indexPengangkutanDarurat()
{
    // Ambil user yang sedang login
    $user = Auth::user();

    // Pastikan user memiliki relasi ke RW
    $rw = $user->rw;
    if (!$rw) {
        return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses ke pengangkutan darurat.');
    }

    // Ambil data pengangkutan darurat berdasarkan RW
    $pengangkutanDarurat = PengangkutanDarurat::with('rw.kelurahan.kecamatan')
        ->where('rw_id', $rw->id)
        ->orderBy('created_at', 'desc')
        ->get();

    // Tampilkan view dengan data
    return view('rw.index-pengangkutan-darurat', compact('pengangkutanDarurat', 'user'));
}

    public function kirimLokasiForm()
{
    $user = Auth::user();
    return view('rw.tambah-pengangkutan-darurat', compact('user'));
}

public function PengangkutanDarurat(Request $request)
{
    // Validasi input
    $request->validate([
        'kirim_lokasi' => 'required|string',
        'foto' => 'required|array|min:3', // Harus minimal 3 gambar
        'foto.*' => 'image|mimes:jpg,jpeg,png|max:2048', // Validasi setiap file gambar
    ]);

    // Ambil user yang sedang login
    $user = Auth::user();

    // Pastikan user memiliki relasi ke RW
    if (!$user->rw) {
        return redirect()->route('rw.tambah-pengangkutan-darurat')->with('error', 'Anda tidak memiliki akses untuk melakukan pengangkutan darurat.');
    }

    // Simpan data pengangkutan darurat
    $pengangkutanDarurat = new PengangkutanDarurat();
    $pengangkutanDarurat->rw_id = $user->rw->id; // Set rw_id berdasarkan user
    $pengangkutanDarurat->kirim_lokasi = $request->input('kirim_lokasi');
    $pengangkutanDarurat->status = 'Pending'; // Status default

    // Upload foto
    $fotoPaths = [];
    if ($request->hasFile('foto')) {
        foreach ($request->file('foto') as $file) {
            $path = $file->store('pengangkutan_darurat', 'public'); // Simpan di folder storage/public/pengangkutan_darurat
            $fotoPaths[] = basename($path); // Simpan hanya nama file
        }
    }

    $pengangkutanDarurat->foto = json_encode($fotoPaths); // Simpan path foto sebagai JSON
    $pengangkutanDarurat->save();

    return redirect()->route('rw.tambah-pengangkutan-darurat')->with('success', 'Data pengangkutan darurat berhasil disimpan.');
}
    public function kritikSaranForm()
    {
        return view('rw.kritik-saran');
    }

    public function submitKritikSaran(Request $request)
    {
        $validated = $request->validate([
            'lokasi' => 'required|string|max:255',
            'kritik' => 'required|string',
            'saran' => 'required|string',
            'foto.*' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $fotoPaths = [];
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $foto) {
                $fotoPaths[] = $foto->store('kritiksaran', 'public');
            }
        }

        KritikSaranRw::create([
            'lokasi' => $validated['lokasi'],
            'kritik' => $validated['kritik'],
            'saran' => $validated['saran'],
            'foto' => json_encode($fotoPaths),
        ]);

        return redirect()->back()->with('success', 'Kritik dan saran berhasil dikirim.');
    }

    public function konfirmasilaporan()
    {
        $user = Auth::user();
        $rw = $user->rw;

        if (!$rw) {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses ke jadwal pengangkutan.');
        }

        $jadwal = LaporanTugas::with(['jadwalpengangkutan.rw', 'jadwalpengangkutan.petugas'])
            ->whereHas('jadwalpengangkutan', function ($query) use ($rw) {
                $query->where('rw_id', $rw->id);
            })
            ->where('status_pengangkutan', 'Pending')
            ->get();

        $Disetujui = LaporanTugas::with(['jadwalpengangkutan.rw', 'jadwalpengangkutan.petugas'])
            ->whereHas('jadwalpengangkutan', function ($query) use ($rw) {
                $query->where('rw_id', $rw->id);
            })
            ->where('status_pengangkutan', 'Disetujui')
            ->get();

        return view('rw.konfirmasilaporan', compact('jadwal', 'Disetujui', 'user'));
    }

    public function konfirmasi($id)
    {
        $laporan = LaporanTugas::findOrFail($id);
        $laporan->status_pengangkutan = 'Disetujui';
        $laporan->save();

        return redirect()->back()->with('success', 'Laporan berhasil dikonfirmasi.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
