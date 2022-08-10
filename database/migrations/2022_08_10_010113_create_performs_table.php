<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performs', function (Blueprint $table) {
            $table->unsignedBigInteger('actor_id');
            $table->unsignedBigInteger('serie_id');
            $table->timestamps();

            $table->primary(['actor_id', 'serie_id']);
            $table->foreign('actor_id')->references('id')->on('actors')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('performs');
    }
}
