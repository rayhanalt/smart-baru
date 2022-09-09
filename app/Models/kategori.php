<?php

namespace App\Models;


use App\Models\alternatif;
use App\Models\kategori_benefit;
use App\Models\kategori_final;
use App\Models\kategori_utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kategori extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'kategori';
    protected $dates = [
        'created_at',
        'updated_at'
    ];
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
    public function kategori_utility()
    {
        return $this->hasMany(kategori_utility::class, 'kode_kategori', 'kode_kategori');
    }
    public function kategori_final()
    {
        return $this->hasMany(kategori_final::class, 'kode_kategori', 'kode_kategori');
    }
}
