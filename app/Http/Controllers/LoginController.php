<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            $role = Auth::user()->role;

            // Menyimpan rw_id atau petugas_id ke session berdasarkan role
            if ($role == 'Petugas') {
                session(['petugas_id' => Auth::user()->petugas_pengangkutan_id]);
            } elseif ($role == 'RW') {
                session(['rw_id' => Auth::user()->rw_id]);
            }

            // Redirect berdasarkan role
            switch ($role) {
                case 'Pemerintah':
                    return redirect()->route('pemerintah.dashboard');
                case 'RW':
                    return redirect()->route('rw.dashboard');
                case 'Petugas':
                    return redirect()->route('petugas.dashboard');
                default:
                    Auth::logout();
                    return redirect()->route('login')->withErrors('Role tidak dikenali.');
            }
        }

        return back()->withErrors('Login gagal! Periksa email atau password Anda.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
