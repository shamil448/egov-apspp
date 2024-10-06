<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function create()
    {
        return view('accounts.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|max:255',
            'phone' => 'required|numeric',
            'gender' => 'required',
            'access_right' => 'required',
            'address' => 'required',
        ]);

        // Menyimpan data ke dalam database
        Account::create([
            'username' => $request->input('username'),
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'access_right' => $request->input('access_right'),
            'address' => $request->input('address'),
        ]);

        return redirect()->back()->with('success', 'Akun berhasil ditambahkan.');
    }
}
