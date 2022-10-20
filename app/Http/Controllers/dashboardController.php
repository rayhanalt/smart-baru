<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
use App\Models\kategori;
use App\Models\mahasiswa;

class dashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard', [
            'kategori' => kategori::count(),
            'alternatif' => alternatif::count(),
            'mahasiswa' => mahasiswa::count(),
        ]);
    }
}
