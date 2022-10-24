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
        Schema::create('alternatif_benefit', function (Blueprint $table) {
            $table->id();
            $table->string('kode_benefit_alternatif', 12)->unique();
            $table->string('kode_alternatif', 12);
            $table->string('kode_kriteria', 12);
            $table->string('nim', 9);
            $table->float('nilai_parameter', 9, 5)->default(0.2);
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
        Schema::dropIfExists('alternatif_benefit');
    }
};
