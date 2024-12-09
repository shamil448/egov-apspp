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
            'category' => 'required|in:Berita,Edukasi',
            'subject' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'type' => 'required|in:article,video,course',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validasi gambar
            'published_at' => 'nullable|date',
        ]);

        $data = $request->all();

    // Cek dan simpan file gambar
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('images/education', 'public');
    }

    Education::create($data);

    return redirect()->route('pemerintah.listedukasi')->with('success', 'Edukasi berhasil ditambahkan.');
    }

    public function show($id)
    {
        $education = Education::findOrFail($id);
        return view('education.show', compact('education'));
    }

    public function uploadGambar(Request $request)
    {
        $request->validate([
            'education_id' => 'required|exists:education,id',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

        $education = Education::findOrFail($request->education_id);

        // Simpan gambar
        $path = $request->file('image')->store('images/education', 'public');

        // Update kolom gambar
        $education->update(['image' => $path]);

        return redirect()->back()->with('success', 'Gambar berhasil diunggah.');
    }
}
