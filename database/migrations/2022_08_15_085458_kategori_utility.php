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
        Schema::create('kategori_utility', function (Blueprint $table) {
            $table->id();
            $table->string('kode_utility_kategori', 12)->unique();
            $table->string('kode_kategori', 12);
            $table->string('kode_benefit_kategori', 12);
            $table->string('kode_kriteria', 12);
            $table->string('nim', 9);
            $table->float('nilai_utility', 9, 5);
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
        Schema::dropIfExists('kategori_utility');
    }
};
