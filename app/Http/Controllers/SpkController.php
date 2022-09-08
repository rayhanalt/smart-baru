<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\kriteria;
use Illuminate\Http\Request;
use App\Models\kategori_benefit;
use App\Models\kategori_final;
use App\Models\kategori_utility;
use Illuminate\Support\Facades\DB;

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



                $hasils = kategori_benefit::select(DB::raw('min(nilai_parameter) as nilai_min, max(nilai_parameter) as nilai_max, kode_kriteria'))
                    ->where('nim', session('nim'))
                    ->groupBy('kode_kriteria')
                    ->get();

                foreach ($hasils as $hasil) {
                    $nilai_parameters = kategori_benefit::select(DB::raw('nilai_parameter, kode_benefit_kategori, kode_kriteria, kode_kategori'))
                        ->where('nim', session('nim'))
                        ->where('kode_kriteria', $hasil->kode_kriteria)
                        ->get();

                    foreach ($nilai_parameters as $nilai_parameter) {
                        $nilai_utility = 0;

                        if ($hasil->nilai_max - $hasil->nilai_min != 0) {
                            $nilai_utility = ($nilai_parameter->nilai_parameter - $hasil->nilai_min) / ($hasil->nilai_max - $hasil->nilai_min);
                        }

                        kategori_utility::updateOrCreate([
                            'kode_kriteria' => $nilai_parameter->kode_kriteria,
                            'kode_kategori' => $nilai_parameter->kode_kategori,
                            'nim' => session('nim'),
                            'kode_benefit_kategori' => $nilai_parameter->kode_benefit_kategori,
                        ], [
                            'nilai_utility' => $nilai_utility
                        ]);
                    }
                }

                $utility = kategori_utility::select(DB::raw('nilai_utility, kode_kriteria'))
                    ->with('kriteria')
                    ->where('nim', session('nim'))
                    ->groupBy('kode_kriteria')
                    ->get();

                foreach ($utility as $final) {
                    $nilai_utilitys = kategori_utility::select(DB::raw('nilai_utility, kode_utility_kategori, kode_kriteria, kode_kategori'))
                        ->where('nim', session('nim'))
                        ->where('kode_kriteria', $final->kode_kriteria)
                        ->get();

                    foreach ($nilai_utilitys as $nilai_util) {

                        $nilai_final = $nilai_util->nilai_utility * $final->kriteria->bobot;

                        kategori_final::updateOrCreate([
                            'kode_kriteria' => $nilai_util->kode_kriteria,
                            'kode_kategori' => $nilai_util->kode_kategori,
                            'nim' => session('nim'),
                            'kode_utility_kategori' => $nilai_util->kode_utility_kategori,
                        ], [
                            'nilai_akhir' => $nilai_final
                        ]);
                    }
                }
            }
        }

        // return redirect("/spk/spk")->with('success', 'New Data has been added!')->withInput();
    }
}
