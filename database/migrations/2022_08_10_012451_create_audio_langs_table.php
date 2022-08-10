<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudioLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio_langs', function (Blueprint $table) {
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('serie_id');
            $table->timestamps();

            $table->primary(['language_id', 'serie_id']);
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('serie_id')->references('id')->on('series')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audio_langs');
    }
}
