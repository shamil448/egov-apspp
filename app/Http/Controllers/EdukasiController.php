<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;

class EdukasiController extends Controller
{
    // Menampilkan daftar edukasi di halaman home
    public function index()
    {
        // Ambil semua data edukasi dari database
        $educations = Education::all();
        // Kirim data edukasi ke view 'educations'
        return view('educations', compact('educations'));
    }

    // Menampilkan form tambah edukasi
    public function create()
    {
        $educations = Education::all(); // Ambil semua data edukasi
        return view('Pemerintah.tambah-edukasi', compact('educations')); // Kirim data ke view
    }

    // Menyimpan data edukasi ke database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'author' => 'required|string|max:255',
            'type' => 'required|in:article,video,course',
            'published_at' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
            'video' => 'nullable|mimetypes:video/mp4,video/mpeg,video/quicktime|max:10240', // Validasi untuk video
    ]);

        $data = $request->only([
            'title',
            'content',
            'author',
            'type',
            'published_at',
    ]);

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
        $education = Education::findOrFail($id);
        return view('education.show', compact('education'));
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
