<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\kategori_benefit;
use App\Models\kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SpkController extends Controller
{
    public function minat()
    {
        return view('spk/minat', [
            'kategori' => kategori::get(),
            $kriteria = kriteria::where('nama_kriteria', '=', 'minat')->first(),
            'kriteria' => $kriteria,
        ]);
    }
    public function store(Request $request)
    {
        // $kode_benefit_kategori = 'KBK-' . rand(100000, 999999);

        foreach ($request->nilai_parameter as $kode_kategori => $nilai_parameter) {
            kategori_benefit::create([
                'kode_kategori' => $kode_kategori,
                'kode_kriteria' => $request->kode_kriteria,
                'nim' => session('nim'),
                'nilai_parameter' => $nilai_parameter
            ]);
        }

        return redirect('/spk/minat')->with('success', 'New Data has been added!')->withInput();
    }
}
