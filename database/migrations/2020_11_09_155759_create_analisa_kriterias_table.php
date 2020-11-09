<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisaKriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisa_kriterias', function (Blueprint $table) {
            $table->id();
            $table->string('id_analisa_kriteria');
            $table->date('date');
            $table->string('id_kriteria_1');
            $table->string('id_kriteria_2');
            $table->decimal('nilai_analisa_kriteria');
            $table->decimal('hasil_analisa_kriteria');
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
        Schema::dropIfExists('analisa_kriterias');
    }
}
