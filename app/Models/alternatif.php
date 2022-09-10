<?php

namespace App\Models;

use App\Models\kategori;
use App\Models\alternatif_benefit;
use App\Models\alternatif_final;
use App\Models\alternatif_utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class alternatif extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'alternatif';
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    public function getRouteKeyName()
    {
        return 'kode_alternatif';
    }
    public static function boot()
    {
        parent::boot();
        static::creating(
            function ($model) {
                $model->kode_alternatif = 'KA-' . rand(100000, 999999);
            }
        );
    }
    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'kode_kategori', 'kode_kategori');
    }
    public function alternatif_benefit()
    {
        return $this->hasMany(alternatif_benefit::class, 'kode_alternatif', 'kode_alternatif');
    }
    public function alternatif_utility()
    {
        return $this->hasMany(alternatif_utility::class, 'kode_alternatif', 'kode_alternatif');
    }
    public function alternatif_final()
    {
        return $this->hasMany(alternatif_final::class, 'kode_alternatif', 'kode_alternatif');
    }
}
