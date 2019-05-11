<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Clase dedicada para modelar los campos de la tabla projects
 *
 * @author Jhonier Gaviria M. - May. 09-2019
 * @version 1.0.0
 */
class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address');
            $table->bigInteger('circuit_id')->unsigned();
            $table->bigInteger('city_id')->unsigned();
            $table->string('code');
            $table->smallInteger('electrical_voltage_level');
            $table->string('image');
            $table->boolean('status');
            $table->bigInteger('type_network_id')->unsigned();
            $table->bigInteger('type_town_id')->unsigned();
            $table->timestamps();

            $table->foreign('circuit_id')->references('id')->on('circuits');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('type_network_id')->references('id')->on('types_networks');
            $table->foreign('type_town_id')->references('id')->on('types_towns');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
