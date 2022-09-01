<?php

namespace App\Models;

use App\Models\kategori_benefit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kriteria extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'kriteria';

    public function getRouteKeyName()
    {
        return 'kode_kriteria';
    }

    public function kategori_benefit()
    {
        return $this->hasMany(kategori_benefit::class, 'kode_kriteria', 'kode_kriteria');
    }
}
