<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalTiusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_tius', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('paket_id');
            $table->foreign('paket_id')->references('id')->on('paket_soals')->onDelete('cascade');
            $table->text('soal');
            $table->text('pilihan_1');
            $table->text('pilihan_2');
            $table->text('pilihan_3');
            $table->text('pilihan_4');
            $table->text('jawaban');
            $table->text('pembahasan');
            $table->integer('skor');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soal_tius');
    }
}
