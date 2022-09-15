<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\mahasiswa;
use Livewire\WithPagination;

class MahasiswaLivewire extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.mahasiswa-livewire', [
            'mahasiswa' => mahasiswa::Paginate(5)->withQueryString()
        ]);
    }
}
