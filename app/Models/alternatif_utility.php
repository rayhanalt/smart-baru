<?php

namespace App\Models;

use App\Models\kriteria;
use App\Models\mahasiswa;
use App\Models\alternatif;
use App\Models\alternatif_final;
use App\Models\alternatif_benefit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class alternatif_utility extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'alternatif_utility';

    public function getRouteKeyName()
    {
        return 'kode_utility_alternatif';
    }
    public static function boot()
    {
        parent::boot();
        static::creating(
            function ($model) {
                $model->kode_utility_alternatif = 'KUA-' . rand(100000, 999999);
            }
        );
    }
    // HasMany
    public function alternatif_final()
    {
        return $this->hasMany(alternatif_final::class, 'kode_utility_alternatif', 'kode_utility_alternatif');
    }

    // belongsTo
    public function alternatif_benefit()
    {
        return $this->belongsTo(alternatif_benefit::class, 'kode_benefit_alternatif', 'kode_benefit_alternatif');
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
