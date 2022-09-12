<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\alternatif;
use Illuminate\Http\Request;
use PDF;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('alternatif.index', [
            'alternatif' => alternatif::with('kategori')->orderBy('kode_kategori')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alternatif.create', [
            'alternatif' => alternatif::get(),
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
            'nama_alternatif' => 'required',
            'kode_kategori' => 'required',
        ]);
        alternatif::create($validasi);

        return redirect('/alternatif')->with('success', 'New Data has been added!')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function show(alternatif $alternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function edit(alternatif $alternatif)
    {
        return view('alternatif.edit', [
            'item' => $alternatif,
            'alternatif' => alternatif::get(),
            'kategori' => kategori::get()

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, alternatif $alternatif)
    {
        $validasi = $request->validate([
            'nama_alternatif' => 'required',
            'kode_kategori' => 'required',
        ]);
        $alternatif->update($validasi);

        return redirect('/alternatif')->with('success', 'Data has been updated!')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function destroy(alternatif $alternatif)
    {
        $alternatif->delete();
        return redirect('/alternatif')->with('success', 'Data has been deleted!');
    }
    public function createPDF()
    {
        $users = alternatif::with('kategori')->orderBy('kode_kategori')->get();

        $data = [
            'title' => 'Laporan Data UKM',
            'date' => date('m/d/Y'),
            'users' => $users,
        ];
        $pdf = PDF::loadView('alternatif.pdf', $data);
        $set = $pdf->setPaper('a4', 'portrait');
        return $set->stream('alternatif.pdf');
    }
}
