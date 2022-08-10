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
            $table->unsignedBigInteger('platform_id');
            $table->unsignedBigInteger('director_id');
            $table->timestamps();

            $table->foreign('platform_id')->references('id')->on('platforms')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('director_id')->references('id')->on('directors')->onDelete('restrict')->onUpdate('restrict');
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
