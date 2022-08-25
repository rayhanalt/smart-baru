<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class SpkController extends Controller
{
    public function minat()
    {
        return view('spk/minat',[
            'kategori' => kategori::get(),    
        ]);
    }
}
