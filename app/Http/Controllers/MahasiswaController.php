<?php

namespace App\Http\Controllers;

use App\Models\kategori_benefit;
use App\Models\alternatif_benefit;
use PDF;
use App\Models\mahasiswa;
use App\Models\kategori_final;
use App\Models\alternatif_final;
use App\Models\kategori_utility;
use App\Models\alternatif_utility;
use App\Models\kriteria;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mahasiswa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create', [
            'mahasiswa' => mahasiswa::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validasi = $request->validate([
            'nim' => 'required|size:9|unique:mahasiswa',
            'nama' => 'required',
        ]);

        mahasiswa::create($validasi);

        return redirect('/mahasiswa')->with('success', 'New Data has been added!')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(mahasiswa $mahasiswa)
    {
        $total_kategori =  kategori_final::select(DB::raw('SUM(nilai_akhir) as total,kode_kategori,nim'))
            ->with('kategori', 'mahasiswa')
            ->where('nim', $mahasiswa->nim)
            ->groupBy('kode_kategori')
            ->orderBy('total', 'DESC')
            ->get();
        $total_alternatif =  alternatif_final::select(DB::raw('SUM(nilai_akhir) as total,kode_alternatif,nim'))
            ->with('alternatif', 'mahasiswa')
            ->where('nim', $mahasiswa->nim)
            ->groupBy('kode_alternatif')
            ->orderBy('total', 'DESC')
            ->get();

        $kriteria = kriteria::get();

        return view('mahasiswa.show', [
            'total_kategori' => $total_kategori,
            'total_alternatif' => $total_alternatif,
            'mahasiswa' => mahasiswa::where('nim', $mahasiswa->nim)->first(),
            'kriteria' => $kriteria,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', [
            'item' => $mahasiswa,
            'mahasiswa' => mahasiswa::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mahasiswa $mahasiswa)
    {
        $rules = [
            'nim' => 'required|digits:9',
            'nama' => 'required'
        ];
        if ($request->nim != $mahasiswa->nim) {
            $rules['nim'] = 'required|digits:9|unique:mahasiswa';
        }

        kategori_benefit::where('nim', $mahasiswa->nim)->update(['nim' => $request->nim]);
        kategori_utility::where('nim', $mahasiswa->nim)->update(['nim' => $request->nim]);
        kategori_final::where('nim', $mahasiswa->nim)->update(['nim' => $request->nim]);
        alternatif_benefit::where('nim', $mahasiswa->nim)->update(['nim' => $request->nim]);
        alternatif_utility::where('nim', $mahasiswa->nim)->update(['nim' => $request->nim]);
        alternatif_final::where('nim', $mahasiswa->nim)->update(['nim' => $request->nim]);

        $validasi = $request->validate($rules);


        $mahasiswa->update($validasi);

        return redirect('/mahasiswa')->with('success', 'Data has been updated!')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(mahasiswa $mahasiswa)
    {
        kategori_benefit::where('nim', $mahasiswa->nim)->delete();
        kategori_utility::where('nim', $mahasiswa->nim)->delete();
        kategori_final::where('nim', $mahasiswa->nim)->delete();
        alternatif_benefit::where('nim', $mahasiswa->nim)->delete();
        alternatif_utility::where('nim', $mahasiswa->nim)->delete();
        alternatif_final::where('nim', $mahasiswa->nim)->delete();

        $mahasiswa->delete();

        return redirect()->back()->with('success', 'Data has been deleted!')->withInput();
    }
    public function createPDF()
    {
        $users = mahasiswa::get();

        $data = [
            'title' => 'Laporan Data Mahasiswa',
            'date' => date('m/d/Y'),
            'users' => $users,
        ];
        $pdf = PDF::loadView('mahasiswa.pdf', $data);
        $set = $pdf->setPaper('a4', 'portrait');
        return $set->stream('mahasiswa.pdf');
    }
    public function DetailPDF(mahasiswa $mahasiswa)
    {
        $total_kategori =  kategori_final::select(DB::raw('SUM(nilai_akhir) as total,kode_kategori,nim'))
            ->with('kategori', 'mahasiswa')
            ->where('nim', $mahasiswa->nim)
            ->groupBy('kode_kategori')
            ->orderBy('total', 'DESC')
            ->get();
        $total_alternatif =  alternatif_final::select(DB::raw('SUM(nilai_akhir) as total,kode_alternatif,nim'))
            ->with('alternatif', 'mahasiswa')
            ->where('nim', $mahasiswa->nim)
            ->groupBy('kode_alternatif')
            ->orderBy('total', 'DESC')
            ->get();

        $kriteria = kriteria::get();

        $data = [
            'title' => 'Laporan Data Detail ' . $mahasiswa->nama . '',
            'date' => date('m/d/Y'),
            'total_kategori' => $total_kategori,
            'total_alternatif' => $total_alternatif,
            'kriteria' => $kriteria,
        ];
        $pdf = PDF::loadView('mahasiswa.showpdf', $data);
        $set = $pdf->setPaper('a4', 'portrait');
        return $set->stream('mahasiswa.showpdf');
    }
}
