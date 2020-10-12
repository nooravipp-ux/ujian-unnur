<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblJawabPgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_jawab_pg', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mhs');
            $table->string('id_paket_soal', 25);
            $table->foreignId('id_soal');
            $table->string('pilihian', 25);
            $table->decimal('nilai_pilihan',8,2);
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
        Schema::dropIfExists('tbl_jawab_pg');
    }
}
