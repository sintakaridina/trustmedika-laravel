<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id');
            $table->foreignId('poli_id');
            $table->enum('hari', ['senin','selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu']);
            $table->time('waktu_mulai');
            $table->time('waktu_akhir');
            $table->timestamps();

            $table->foreign('pegawai_id')->references('id')->on('pegawais');
            $table->foreign('poli_id')->references('id')->on('polis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwals');
    }
}
