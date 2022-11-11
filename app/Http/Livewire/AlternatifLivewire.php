<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\alternatif;
use Livewire\WithPagination;

class AlternatifLivewire extends Component
{
    use WithPagination;

    public function render()
    {
        $alternatif = alternatif::with('kategori')->orderBy('kode_kategori', 'asc')->orderBy('id', 'asc')->Paginate(5)->withQueryString();

        return view('livewire.alternatif-livewire', [
            'alternatif' => $alternatif
        ]);
    }
}
