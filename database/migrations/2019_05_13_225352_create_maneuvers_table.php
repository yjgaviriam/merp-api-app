<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Clase dedicada para modelar los campos de la tabla maneuvers
 *
 * @author Jhonier Gaviria M. - May. 13-2019
 * @version 1.0.0
 */
class CreateManeuversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maneuvers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('action');
            $table->string('description');
            $table->dateTime('date');
            $table->string('element');
            $table->bigInteger('project_id')->unsigned();
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maneuvers');
    }
}
