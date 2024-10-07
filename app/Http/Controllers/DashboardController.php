<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the dashboard page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Mengembalikan view dashboard
        return view('dashboard');
    }
}
