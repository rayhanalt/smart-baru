<?php

namespace App\Models;

use App\Models\kategori_utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kategori_final extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'kategori_final';

    public function getRouteKeyName()
    {
        return 'kode_final_kategori';
    }
    public static function boot()
    {
        parent::boot();
        static::creating(
            function ($model) {
                $model->kode_final_kategori = 'KFK-' . rand(100000, 999999);
            }
        );
    }
    // HasMany

    // belongsTo
    public function kategori_utility()
    {
        return $this->belongsTo(kategori_utility::class, 'kode_utility_kategori', 'kode_utility_kategori');
    }
    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'kode_kategori', 'kode_kategori');
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
