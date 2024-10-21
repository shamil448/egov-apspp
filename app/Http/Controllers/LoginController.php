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
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 'Pemerintah') {
                return redirect()->route('Pemerintah.dashboard');
                
            } elseif (Auth::user()->role == 'Petugas') {
                return redirect()->route('Petugas.dashboard');
            
            } elseif (Auth::user()->role == 'RW') {
                return redirect()->route('RW.dashboard');
            }

        } else {
            return redirect('login')->withErrors('Username dan Password yang dimasukkan tidak sesuai')->withinput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
