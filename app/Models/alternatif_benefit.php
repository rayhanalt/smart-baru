<?php

namespace App\Models;

use App\Models\kriteria;
use App\Models\mahasiswa;
use App\Models\alternatif;
use App\Models\alternatif_utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class alternatif_benefit extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'alternatif_benefit';

    public function getRouteKeyName()
    {
        return 'kode_benefit_alternatif';
    }
    public static function boot()
    {
        parent::boot();
        static::creating(
            function ($model) {
                $model->kode_benefit_alternatif = 'KBA-' . rand(100000, 999999);
            }
        );
    }
    // HasMany
    public function alternatif_utility()
    {
        return $this->hasMany(alternatif_utility::class, 'kode_benefit_alternatif', 'kode_benefit_alternatif');
    }

    // belongsTo
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
