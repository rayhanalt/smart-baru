<?php

namespace App\Http\Controllers;

use App\Models\kriteria;
use App\Models\mahasiswa;
use Illuminate\Http\Request;

class AlurController extends Controller
{

    public function alur(Request $request)
    {

        $input = mahasiswa::where('nim', '=', $request->input('nim'))->first();
        if ($input === null) {
            $validasi = $request->validate([
                'nim' => 'required|size:9|unique:mahasiswa',
                'nama' => 'required',
            ]);
            mahasiswa::create($validasi);
            session()->put([
                'nim' => $request->nim,
                'nama' => $request->nama,
            ]);
        } else {
            session()->put([
                'nim' => $request->nim,
                'nama' => $input->nama,
            ]);
        }

        return redirect('/spk/spk')->with('success', 'Sesi pengambilan keputusan dimulai')->withInput();
    }

    public function hapus(Request $request)
    {
        $request->session()->flush();
        return redirect('/')->with('blocked', 'Sesi telah berakhir')->withInput();
    }
    public function alurAlternatif(Request $request)
    {
        session()->put([
            'kode_kategori' => $request->kode_kategori
        ]);
        $kriteria = kriteria::first();
        return redirect("/spk/spk-alternatif/{$kriteria->kode_kriteria}")->with('success', 'Sesi pengambilan keputusan UKM dimulai')->withInput();
    }
}
