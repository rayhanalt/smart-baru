<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\kriteria;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        user::create([
            'username' => 'admin',
            'nama' => 'Rayhan Althaf',
            'password' => bcrypt('12345'),
        ]);
        // kriteria::create([
        //     'kode_kriteria' => 'KD-001',
        //     'nama_kriteria' => 'Minat',
        //     'bobot' => '0.63',
        // ]);
        // kriteria::create([
        //     'kode_kriteria' => 'KD-002',
        //     'nama_kriteria' => 'Bakat',
        //     'bobot' => '0.26',
        // ]);
        // kriteria::create([
        //     'kode_kriteria' => 'KD-003',
        //     'nama_kriteria' => 'Pengalaman',
        //     'bobot' => '0.11',
        // ]);
    }
}
