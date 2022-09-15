<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\kategori;
use Livewire\WithPagination;

class KategoriLivewire extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.kategori-livewire', [
            'kategori' => kategori::Paginate(5)->withQueryString()
        ]);
    }
}
