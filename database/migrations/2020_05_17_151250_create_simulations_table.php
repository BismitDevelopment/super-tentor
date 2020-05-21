<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simulations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('paket_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('paket_id')->references('id')->on('paket_soals')->onDelete('cascade');
            $table->integer('skor_tiu');
            $table->integer('skor_twk');
            $table->integer('skor_tkp');
            $table->integer('total_skor');
            $table->string('status');
            $table->time('durasi_ujian',0);
            $table->text('array_jawaban_twk');
            $table->text('array_jawaban_tiu');
            $table->text('array_jawaban_tkp');
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
        Schema::dropIfExists('simulations');
    }
}
