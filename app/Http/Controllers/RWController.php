<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RWController extends Controller
{
    public function dashboard()
    {
        return view('RW.dashboard'); // Mengembalikan view dashboard
    }
}
