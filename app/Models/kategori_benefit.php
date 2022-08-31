<?php

namespace App\Models;

use App\Models\kategori;
use App\Models\kriteria;
use App\Models\mahasiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kategori_benefit extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'kategori_benefit';

    public function getRouteKeyName()
    {
        return 'kode_benefit_kategori';
    }
    public static function boot()
    {
        parent::boot();
        static::creating(
            function ($model) {
                $model->kode_benefit_kategori = 'KBK-' . rand(100000, 999999);
            }
        );
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
