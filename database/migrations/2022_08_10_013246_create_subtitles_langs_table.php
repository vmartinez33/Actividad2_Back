<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubtitlesLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subtitles_langs', function (Blueprint $table) {
            $table->unsignedBigInteger('id_language');
            $table->unsignedBigInteger('id_series');
            $table->timestamps();

            $table->primary(['id_language', 'id_series']);
            $table->foreign('id_language')->references('id')->on('languages')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_series')->references('id')->on('series')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subtitles_langs');
    }
}
