<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 200)->unique();
            $table->unsignedBigInteger('id_platform');
            $table->unsignedBigInteger('id_director');
            $table->timestamps();

            $table->foreign('id_platform')->references('id')->on('platforms')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_director')->references('id')->on('directors')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('series');
    }
}
