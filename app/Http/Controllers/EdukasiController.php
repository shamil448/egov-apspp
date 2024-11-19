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
        return view('Pemerintah.tambah-edukasi');
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
            'published_at' => 'nullable|date',
        ]);

        Education::create($request->all());

        return redirect()->route('pemerintah.listedukasi')->with('success', 'Edukasi berhasil ditambahkan.');
    }
    public function show($id)
{
    $education = Education::findOrFail($id);
    return view('education.show', compact('education'));
}
}
