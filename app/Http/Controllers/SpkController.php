<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\kriteria;
use Illuminate\Http\Request;
use App\Models\kategori_benefit;
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


                // max dari nilai parameter masing-masing kriteria
                $maxMinat = kategori_benefit::select(DB::raw('max(nilai_parameter) as nilai_max'))
                    ->where('nim', session('nim'))
                    ->where('kode_kriteria', 'KD-001')
                    ->pluck('nilai_max')
                    ->first();
                $maxBakat = kategori_benefit::select(DB::raw('max(nilai_parameter) as nilai_max'))
                    ->where('nim', session('nim'))
                    ->where('kode_kriteria', 'KD-002')
                    ->pluck('nilai_max')
                    ->first();
                $maxPengalaman = kategori_benefit::select(DB::raw('max(nilai_parameter) as nilai_max'))
                    ->where('nim', session('nim'))
                    ->where('kode_kriteria', 'KD-003')
                    ->pluck('nilai_max')
                    ->first();


                // min dari nilai parameter masing-masing kriteria
                $minMinat = kategori_benefit::select(DB::raw('min(nilai_parameter) as nilai_min'))
                    ->where('nim', session('nim'))
                    ->where('kode_kriteria', 'KD-001')
                    ->pluck('nilai_min')
                    ->first();
                $minBakat = kategori_benefit::select(DB::raw('min(nilai_parameter) as nilai_min'))
                    ->where('nim', session('nim'))
                    ->where('kode_kriteria', 'KD-002')
                    ->first();
                $minPengalaman = kategori_benefit::select(DB::raw('min(nilai_parameter) as nilai_min'))
                    ->where('nim', session('nim'))
                    ->where('kode_kriteria', 'KD-003')
                    ->first();


                // min dari nilai parameter masing-masing kriteria
                $parameterMinat = kategori_benefit::select(DB::raw('nilai_parameter'))
                    ->where('nim', session('nim'))
                    ->where('kode_kriteria', 'KD-001')
                    ->get();
                // foreach ($parameterMinat as $hitung) {
                //     $hitung - $minMinat /  $maxMinat - $minMinat;
                // }
                // dd(json_encode($hitung));

                foreach ($parameterMinat as $para) {
                    if ($maxMinat - $minMinat == 0) {
                        dd(0);
                    } else {
                        dd(($para->nilai_parameter - $minMinat) / ($maxMinat - $minMinat));
                    }
                }

                // Hitung
                return view("spk/coba", [
                    'katben' => kategori_benefit::with('mahasiswa', 'kriteria', 'kategori')->where('nim', '=', session('nim'))->orderBy('kode_kriteria')->get(),
                    'max' => $maxMinat,
                    'parameterMinat' => $parameterMinat,
                    'min' => $minMinat
                ]);
            }
        }

        // return redirect("/spk/spk")->with('success', 'New Data has been added!')->withInput();
    }
}
