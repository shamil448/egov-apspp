<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    // Menampilkan form feedback
    public function create()
    {
        return view('feedback');
    }

    // Menangani penyimpanan data feedback
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'phone' => 'required|regex:/[0-9]{3}-[0-9]{2}-[0-9]{3}/',
            'alamat_lengkap' => 'required|string|max:255',
            'number-input' => 'required|numeric|min:1|max:120',
            'email' => 'required|email',
            'message' => 'nullable|string',
            'file_input' => 'nullable|file|mimes:jpg,png,pdf|max:2048'
        ]);

        // Proses penyimpanan data (misalnya simpan ke database atau kirim email)
        // Contoh penyimpanan ke database:
        // Feedback::create($request->all());

        // Jika ada file yang diunggah
        if ($request->hasFile('file_input')) {
            $file = $request->file('file_input');
            $filePath = $file->store('uploads', 'public'); // Menyimpan file di direktori 'public/uploads'
        }

        // Redirect setelah berhasil menyimpan data
        return redirect()->back()->with('success', 'Feedback Anda telah dikirim!');
    }
}
