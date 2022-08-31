<?php

namespace App\Models;

use App\Models\kategori_benefit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class mahasiswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'mahasiswa';

    public function getRouteKeyName()
    {
        return 'nim';
    }
    public function kategori_benefit()
    {
        return $this->hasMany(kategori_benefit::class, 'nim', 'nim');
    }
}
