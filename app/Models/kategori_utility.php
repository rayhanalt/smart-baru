<?php

namespace App\Models;

use App\Models\kategori_benefit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kategori_utility extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'kategori_utility';

    public function getRouteKeyName()
    {
        return 'kode_utility_kategori';
    }
    public static function boot()
    {
        parent::boot();
        static::creating(
            function ($model) {
                $model->kode_utility_kategori = 'KUK-' . rand(100000, 999999);
            }
        );
    }
    public function kategori_benefit()
    {
        return $this->hasMany(kategori_benefit::class, 'kode_benefit_kategori', 'kode_benefit_kategori');
    }
}
