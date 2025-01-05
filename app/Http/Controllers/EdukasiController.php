<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class EdukasiController extends Controller
{
    public function index(Request $request)
    {
        // Hapus data yang berusia lebih dari 5 hari
        Education::where('created_at', '<', Carbon::now()->subDays(5))->delete();

        $query = Education::query();

        if ($request->has('search') && $request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('author', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->has('type') && $request->type) {
            $query->where('type', $request->type);
        }

        $educations = $query->paginate(10);

        return view('educations.index', compact('educations'));
    }

    // Menampilkan form tambah edukasi
    public function create()
    {
        $educations = Education::all(); // Ambil semua data edukasi
        $user = Auth::user();
        return view('educations.create', compact('educations', 'user')); // Kirim data ke view
    }

    // Menyimpan data edukasi ke database
    public function storeEdukasi(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'author' => 'required|string|max:255',
            'type' => 'required|in:article,video,course',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
            'video' => 'nullable|mimetypes:video/mp4,video/mpeg,video/quicktime|max:10240', // Validasi untuk video
        ]);

        $data = $request->only([
            'title',
            'content',
            'author',
            'type',
        ]);

        // Tetapkan published_at dengan waktu saat ini
        $data['published_at'] = now();

        // Cek dan simpan file gambar
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('images/education', 'public');
        }

        // Cek dan simpan file video
        if ($request->hasFile('video')) {
            $data['video_path'] = $request->file('video')->store('videos/education', 'public');
        }

        Education::create($data);

        return redirect()->route('pemerintah.listedukasi')->with('success', 'Edukasi berhasil ditambahkan.');
    }

    public function show($id)
    {
        $educations = Education::findOrFail($id);
        return view('educations.show', compact('educations'));
    }

    public function uploadMedia(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'nullable|mimetypes:video/mp4,video/mpeg,video/quicktime|max:10240',
    ]);

        $mediaPaths = [];

        // Simpan gambar jika ada
        if ($request->hasFile('image')) {
            $mediaPaths['image_path'] = $request->file('image')->store('images/education', 'public');
    }

        // Simpan video jika ada
        if ($request->hasFile('video')) {
            $mediaPaths['video_path'] = $request->file('video')->store('videos/education', 'public');
    }

        return back()->with('success', 'Media berhasil diunggah: ' . json_encode($mediaPaths));
    }

}
