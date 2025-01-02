<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengangkutanDarurat;
use App\Models\JadwalPengangkutan;
use App\Models\KritikSaranRw;
use App\Models\LaporanTugas;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class RWController extends Controller
{
    public function dashboard()
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Pastikan user memiliki relasi ke model PetugasPengangkutan
        $rw = $user->rw;

        // Jika user bukan rw, beri respon error atau redirect
        if (!$rw) {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses ke jadwal pengangkutan.');
        }

        // Ambil jadwal pengangkutan berdasarkan rw yang login
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

        // Kirim data ke view
        return view('rw.dashboard', compact('jadwal', 'pendingCount', 'approvedCount', 'user'));
    }

    // Fungsi untuk menampilkan form kirim lokasi
    public function kirimLokasiForm()
    {
        $user = Auth::user();
        return view('rw.lokasi', compact('user'));
    }

    // Fungsi untuk menangani form kirim lokasi
    public function PengangkutanDarurat(Request $request)
    {
        // Validasi input
        $request->validate([
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Validasi file gambar
            'nama_kecamatan' => 'required|string|max:255',
            'nama_kelurahan' => 'required|string|max:255',
            'kirim_lokasi' => 'required|string',
        ]);

        // Proses upload foto
        $fotoPath = $request->file('foto')->store('pengangkutan_darurat', 'public'); // Simpan di storage/public/uploads

        // Simpan data ke database
        PengangkutanDarurat::create([
            'foto' => $fotoPath,
            'nama_kecamatan' => $request->input('nama_kecamatan'),
            'nama_kelurahan' => $request->input('nama_kelurahan'),
            'kirim_lokasi' => $request->input('kirim_lokasi'),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('rw.lokasi')->with('success', 'Data pengangkutan darurat berhasil disimpan!');
    }
    public function kritikSaranForm()
    {
        return view('rw.kritik-saran');
    }

    // Fungsi untuk menampilkan form Kritik & Saran
    public function submitKritikSaran(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'lokasi' => 'required|string|max:255',
            'kritik' => 'required|string',
            'saran' => 'required|string',
            'foto.*' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Memvalidasi banyak file
        ]);

        // Menangani upload foto jika ada
        $fotoPaths = [];
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $foto) {
                // Simpan setiap file dan tambahkan path ke array
                $fotoPaths[] = $foto->store('kritiksaran', 'public');
            }
        }

        // Simpan data ke dalam database
        KritikSaranRw::create([
            'lokasi' => $validated['lokasi'],
            'kritik' => $validated['kritik'],
            'saran' => $validated['saran'],
            'foto' => json_encode($fotoPaths), // Menyimpan array foto sebagai JSON
        ]);

        // Kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Kritik dan saran berhasil dikirim.');
    }

    public function konfirmasilaporan()
    {
         // Ambil user yang sedang login
         $user = Auth::user();

         // Pastikan user memiliki relasi ke model RW
         $rw = $user->rw;
 
         // Jika user bukan RW, beri respon error atau redirect
         if (!$rw) {
             return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses ke jadwal pengangkutan.');
         }
 
         // Ambil data laporan tugas berdasarkan jadwal pengangkutan
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
 
         // Kirim data ke view
         return view('rw.konfirmasilaporan', compact('jadwal', 'Disetujui', 'user'));
    }

    public function konfirmasi($id)
    {
        $laporan = LaporanTugas::findOrFail($id);
        $laporan->status_pengangkutan = 'Disetujui'; // Update status
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
