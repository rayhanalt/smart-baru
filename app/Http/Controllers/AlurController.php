<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class AlurController extends Controller
{
    
    public function alur(Request $request){
        
        $input = mahasiswa::where('nim', '=', $request->input('nim'))->first();
        if($input === null)
        {
            $validasi = $request->validate([
                'nim' => 'required|size:9|unique:mahasiswa',
                'nama' => 'required',
            ]);
            mahasiswa::create($validasi);
            session()->put('alur',''.$request->nim.' '.$request->nama.'');
            return redirect('/spk/minat')->with('success', 'Sesi pengambilan keputusan dimulai')->withInput();
        }
        else
        {
           
                session()->put('alur',''.$request->nim.' sebagai '.$request->nama.'');
            
           return redirect('/spk/minat')->with('success', 'Sesi pengambilan keputusan dimulai')->withInput();
        }
    }
    public function hapus(Request $request)
    {
        $request->session()->forget('alur');
        return redirect('/')->with('blocked', 'Sesi telah berakhir')->withInput();
    }
}
