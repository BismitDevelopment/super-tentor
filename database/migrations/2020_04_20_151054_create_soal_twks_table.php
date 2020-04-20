<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalTwksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_twks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('soal');
            $table->text('pilihan_1');
            $table->text('pilihan_2');
            $table->text('pilihan_3');
            $table->text('pilihan_4');
            $table->text('jawaban');
            $table->text('pembahasan');
            $table->integer('paket_id');
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
        Schema::dropIfExists('soal_twks');
    }
}
