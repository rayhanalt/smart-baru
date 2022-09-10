<?php

namespace App\Models;

use App\Models\kriteria;
use App\Models\mahasiswa;
use App\Models\alternatif;
use App\Models\alternatif_utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class alternatif_final extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'alternatif_final';

    public function getRouteKeyName()
    {
        return 'kode_final_alternatif';
    }
    public static function boot()
    {
        parent::boot();
        static::creating(
            function ($model) {
                $model->kode_final_alternatif = 'KFA-' . rand(100000, 999999);
            }
        );
    }
    // HasMany

    // belongsTo
    public function alternatif_utility()
    {
        return $this->belongsTo(alternatif_utility::class, 'kode_utility_alternatif', 'kode_utility_alternatif');
    }
    public function alternatif()
    {
        return $this->belongsTo(alternatif::class, 'kode_alternatif', 'kode_alternatif');
    }
    public function kriteria()
    {
        return $this->belongsTo(kriteria::class, 'kode_kriteria', 'kode_kriteria');
    }
    public function mahasiswa()
    {
        return $this->belongsTo(mahasiswa::class, 'nim', 'nim');
    }
}
