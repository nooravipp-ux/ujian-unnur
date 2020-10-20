<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSoalEssayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_soal_essay', function (Blueprint $table) {
            $table->id('id_soal_essay');
            $table->foreignId('id_soal_paket');
            $table->text('soal_essay');
            $table->binary('gambar_essay');
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
        Schema::dropIfExists('tbl_soal_essay');
    }
}
