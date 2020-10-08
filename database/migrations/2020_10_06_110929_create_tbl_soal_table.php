<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_soal', function (Blueprint $table) {
            $table->increments('id_soal');
            $table->string('id_paket_soal',25);
            $table->string('soal',50);
            $table->string('pilihan_a',50);
            $table->string('pilihan_b',50);
            $table->string('pilihan_c',50);
            $table->string('pilihan_d',50);
            $table->string('kunci',25);
            $table->decimal('nilai_soal', 8, 2);
            $table->binary('gambar')->nullable();
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
        Schema::dropIfExists('tbl_soal');
    }
}
