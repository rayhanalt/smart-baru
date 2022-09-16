<?php

namespace Database\Factories;

use App\Models\alternatif;
use App\Models\kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alternatif>
 */
class AlternatifFactory extends Factory
{
    protected $model = alternatif::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'nama_alternatif' => fake()->word(),
            'kode_kategori' => kategori::all()->random()->kode_kategori
        ];
    }
}
