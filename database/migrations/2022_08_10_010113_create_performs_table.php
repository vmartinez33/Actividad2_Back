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
            $table->unsignedBigInteger('id_actor');
            $table->unsignedBigInteger('id_series');
            $table->timestamps();

            $table->primary(['id_actor', 'id_series']);
            $table->foreign('id_actor')->references('id')->on('actors')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('performs');
    }
}
