<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
use App\Models\alternatif_benefit;
use App\Models\alternatif_final;
use App\Models\alternatif_utility;
use App\Models\kategori;
use App\Models\kategori_benefit;
use App\Models\kategori_final;
use App\Models\kategori_utility;
use PDF;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kategori.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create', [
            'kategori' => kategori::get()
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
            'nama_kategori' => 'required',
        ]);
        kategori::create($validasi);

        return redirect('/kategori')->with('success', 'New Data has been added!')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(kategori $kategori)
    {
        return view('kategori.edit', [
            'item' => $kategori,
            'kategori' => kategori::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kategori $kategori)
    {
        $validasi = $request->validate([
            'nama_kategori' => 'required',
        ]);
        $kategori->update($validasi);

        return redirect('/kategori')->with('success', 'Data has been updated!')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(kategori $kategori)
    {
        $kode_alternatif = alternatif::where('kode_kategori', $kategori->kode_kategori)->get();
        foreach ($kode_alternatif as $alter) {
            alternatif_final::where('kode_alternatif', $alter->kode_alternatif)->delete();
            alternatif_utility::where('kode_alternatif', $alter->kode_alternatif)->delete();
            alternatif_benefit::where('kode_alternatif', $alter->kode_alternatif)->delete();
        }

        alternatif::where('kode_kategori', $kategori->kode_kategori)->delete();
        kategori_benefit::where('kode_kategori', $kategori->kode_kategori)->delete();
        kategori_utility::where('kode_kategori', $kategori->kode_kategori)->delete();
        kategori_final::where('kode_kategori', $kategori->kode_kategori)->delete();

        $kategori->delete();

        return redirect()->back()->with('success', 'Data has been deleted!');
    }

    public function createPDF()
    {
        $users = kategori::get();

        $data = [
            'title' => 'Laporan Data Kategori',
            'date' => date('m/d/Y'),
            'users' => $users,
        ];

        $pdf = PDF::loadView('kategori.pdf', $data);
        $set = $pdf->setPaper('a4', 'portrait');
        return $set->stream('kategori.pdf');
    }
}
