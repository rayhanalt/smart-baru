<?php

namespace App\Models;

use App\Models\kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class alternatif extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'alternatif';
    protected $with = 'kategori';
    public function getRouteKeyName()
    {
        return 'kode_alternatif';
    }
    public static function boot()
    {
        parent::boot();
        static::creating(function($model)
        {
        $model->kode_alternatif = 'KA-'.rand(100000,999999);
        }
    );
    }
    public function kategori()
    {
        return $this->belongsTo(kategori::class,'kode_kategori' , 'kode_kategori');
    }
}
