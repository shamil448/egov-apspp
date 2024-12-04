<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelurahans = Kelurahan::with('kecamatan')->get();
        $kecamatan = Kecamatan::all(); // Ambil semua data kecamatan

    return view('kelurahan.index', compact('kelurahans', 'kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kecamatan = Kecamatan::all(); // Ambil semua data kecamatan
        return view('kelurahan.create', compact('kecamatan'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'kelurahan' => 'required|string|max:255',
            'kecamatan_id' => 'required|exists:kecamatan,id',
        ]);

        Kelurahan::create([
            'kelurahan' => $request->kelurahan,
            'kecamatan_id' => $request->kecamatan_id,
        ]);


        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelurahan $kelurahan)
    {
        return view('kelurahan.show', compact('kelurahan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelurahan $kelurahan)
    {
        $kecamatan = Kecamatan::all();
        return view('kelurahan.edit', compact('kelurahan', 'kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelurahan $kelurahan)
    {
        $request->validate([
            'kecamatan_id' => 'required|exists:kecamatan,id',
            'kelurahan' => 'required|string|max:255',
        ]);

        $kelurahan->update($request->all());
        return redirect()->route('kelurahan.index')->with('success', 'Kelurahan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelurahan $kelurahan)
    {
        $kelurahan->delete();
        return redirect()->route('kelurahan.index')->with('success', 'Kelurahan deleted successfully.');
    }
}
