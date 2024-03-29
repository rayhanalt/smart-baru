<?php

namespace App\Models;

use App\Models\kategori_benefit;
use App\Models\kategori_final;
use App\Models\kategori_utility;
use App\Models\alternatif_final;
use App\Models\alternatif_utility;
use App\Models\alternatif_benefit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class mahasiswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'mahasiswa';
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    public function getRouteKeyName()
    {
        return 'nim';
    }
    // hasMany
    public function kategori_benefit()
    {
        return $this->hasMany(kategori_benefit::class, 'nim', 'nim');
    }
    public function kategori_final()
    {
        return $this->hasMany(kategori_final::class, 'nim', 'nim');
    }
    public function kategori_utility()
    {
        return $this->hasMany(kategori_utility::class, 'nim', 'nim');
    }
    public function alternatif_benefit()
    {
        return $this->hasMany(alternatif_benefit::class, 'nim', 'nim');
    }
    public function alternatif_final()
    {
        return $this->hasMany(alternatif_final::class, 'nim', 'nim');
    }
    public function alternatif_utility()
    {
        return $this->hasMany(alternatif_utility::class, 'nim', 'nim');
    }
}
