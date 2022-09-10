<?php

namespace App\Models;

use App\Models\kategori_benefit;
use App\Models\kategori_utility;
use App\Models\kategori_final;
use App\Models\alternatif_benefit;
use App\Models\alternatif_utility;
use App\Models\alternatif_final;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function kategori_utility()
    {
        return $this->hasMany(kategori_utility::class, 'kode_kriteria', 'kode_kriteria');
    }
    public function kategori_final()
    {
        return $this->hasMany(kategori_final::class, 'kode_kriteria', 'kode_kriteria');
    }
    public function alternatif_benefit()
    {
        return $this->hasMany(alternatif_benefit::class, 'kode_kriteria', 'kode_kriteria');
    }
    public function alternatif_utility()
    {
        return $this->hasMany(alternatif_utility::class, 'kode_kriteria', 'kode_kriteria');
    }
    public function alternatif_final()
    {
        return $this->hasMany(alternatif_final::class, 'kode_kriteria', 'kode_kriteria');
    }
}
