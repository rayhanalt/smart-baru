<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use App\Models\kategori_final;
use App\Models\kategori_utility;
use App\Models\kriteria;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Unique;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mahasiswa.index', [
            'mahasiswa' => mahasiswa::all()
        ]);
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
        $total =  kategori_final::select(DB::raw('SUM(nilai_akhir) as total,kode_kategori,nim'))
            ->with('kategori', 'mahasiswa')
            ->where('nim', $mahasiswa->nim)
            ->groupBy('kode_kategori')
            ->orderBy('total', 'DESC')
            ->get();
        $kriteria = kriteria::get();
        $utiliti = kategori_utility::where('nim', $mahasiswa->nim)->get();
        $maha = mahasiswa::select('nama')->where('nim', $mahasiswa->nim)->first();

        return view('mahasiswa.show', [
            'total' => $total,
            'maha' => $maha,
            'util' => $utiliti,
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
            'nim' => 'required|size:9',
            'nama' => 'required'
        ];
        if ($request->nim != $mahasiswa->nim) {
            $rules['nim'] = 'required|size:9|unique:mahasiswa';
        }
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
        $mahasiswa->delete();

        return redirect('/mahasiswa')->with('success', 'Data has been deleted!')->withInput();
    }
}
