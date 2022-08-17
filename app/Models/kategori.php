<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        static::creating(function($model)
        {
            
        $model->kode_kategori = 'KD-K'.rand(100000,999999);

        }
    );
    }
}
