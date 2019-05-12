<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Clase dedicada para modelar los campos de la tabla circuits
 *
 * @author Jhonier Gaviria M. - May. 09-2019
 * @version 1.0.0
 */
class CreateCircuitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circuits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 16);
            $table->string('name', 64);
            $table->bigInteger('substation_id')->unsigned();
            $table->timestamps();

            $table->foreign('substation_id')->references('id')->on('substations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('circuits');
    }
}
