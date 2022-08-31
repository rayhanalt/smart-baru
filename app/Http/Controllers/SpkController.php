<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\kategori_benefit;
use App\Models\kriteria;
use Illuminate\Http\Request;

class SpkController extends Controller
{
    public function spk(Kriteria $kriteria = null)
    {
        if (is_null($kriteria)) {
            $kriteria = kriteria::first();
            return redirect("/spk/spk/{$kriteria->kode_kriteria}");
        }

        return view('spk/spk', [
            'kategori' => kategori::get(),
            'kriteria' => $kriteria,
        ]);
    }
    public function store(Request $request, Kriteria $kriteria = null)
    {
        foreach ($request->nilai_parameter as $kode_kategori => $nilai_parameter) {
            kategori_benefit::updateOrCreate([
                'kode_kategori' => $kode_kategori,
                'kode_kriteria' => $request->kode_kriteria,
                'nim' => session('nim'),
            ], [
                'nilai_parameter' => $nilai_parameter
            ]);
        }

        $semua_kriteria = kriteria::all();

        // Urutkan kriteria
        foreach ($semua_kriteria as $index => $kriteria_sekarang) {

            // Jika kriteria sekarang bukan yang terakhir
            if ($kriteria_sekarang->kode_kriteria == $kriteria->kode_kriteria && $index < count($semua_kriteria) - 1) {
                // Redirect ke kriteria selanjutnya
                $kode_kriteria_terakhir = $semua_kriteria[$index + 1]->kode_kriteria;
                return redirect("/spk/spk/{$kode_kriteria_terakhir}")->with('success', 'New Data has been added!')->withInput();
            } else if ($kriteria_sekarang->kode_kriteria == $kriteria->kode_kriteria) {
                // Hitung
                dd("Hitung ges");
            }
        }

        // return redirect("/spk/spk")->with('success', 'New Data has been added!')->withInput();
    }
}
