<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_final', function (Blueprint $table) {
            $table->id();
            $table->string('kode_final_kategori')->unique();
            $table->string('kode_kategori');
            $table->string('kode_utility_kategori');
            $table->string('kode_kriteria');
            $table->string('nim');
            $table->float('nilai_akhir', 9, 5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori_final');
    }
};
