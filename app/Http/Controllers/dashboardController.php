<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
use App\Models\kategori;
use App\Models\mahasiswa;

class dashboardController extends Controller
{
    public function dashboard()
    {
        // $kategori = kategori::count();
        // $alternatif = alternatif::count();
        // $mahasiswa = mahasiswa::count();

        return view('dashboard', [
            'kategori' => kategori::count(),
            'alternatif' => alternatif::count(),
            'mahasiswa' => mahasiswa::count(),
            'mwaktu' => mahasiswa::get()->last()->updated_at,
            'kwaktu' => kategori::get()->last()->updated_at,
            'awaktu' => alternatif::get()->last()->updated_at,
        ]);
    }
}
