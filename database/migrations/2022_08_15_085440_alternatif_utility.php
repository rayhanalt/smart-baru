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
        Schema::create('alternatif_utility', function (Blueprint $table) {
            $table->id();
            $table->string('kode_utility_alternatif')->unique();
            $table->string('kode_benefit_alternatif');
            $table->integer('nilai_utility');
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
        Schema::dropIfExists('alternatif_utility');
    }
};
