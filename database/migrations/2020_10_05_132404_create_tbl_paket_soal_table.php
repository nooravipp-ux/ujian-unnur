<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPaketSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_paket_soal', function (Blueprint $table) {
            $table->string('id_paket_soal',25)->primary();
            $table->string('id_kategori_soal',25);
            $table->string('nama_paket_soal',45);
            $table->string('waktu',30);
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
        Schema::dropIfExists('tbl_paket_soal');
    }
}
