<?php

namespace App\Models;

use App\Models\kategori_benefit;
use App\Models\alternatif;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kategori extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'kategori';

    public function getRouteKeyName()
    {
        return 'kode_kategori';
    }
    public static function boot()
    {
        parent::boot();
        static::creating(
            function ($model) {

                $model->kode_kategori = 'KK-' . rand(100000, 999999);
            }
        );
    }
    public function alternatif()
    {
        return $this->hasMany(alternatif::class, 'kode_kategori', 'kode_kategori');
    }
    public function kategori_benefit()
    {
        return $this->hasMany(kategori_benefit::class, 'kode_kategori', 'kode_kategori');
    }
}
