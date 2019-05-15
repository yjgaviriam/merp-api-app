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
            $table->string('address', 128);
            $table->bigInteger('circuit_id')->unsigned();
            $table->bigInteger('city_id')->unsigned();
            $table->string('code', 16)->unique();
            $table->smallInteger('electrical_voltage_level');
            $table->string('image', 255)->nullable();
            $table->boolean('status');
            $table->bigInteger('type_network_id')->unsigned();
            $table->bigInteger('type_town_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('circuit_id')->references('id')->on('circuits');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('type_network_id')->references('id')->on('type_networks');
            $table->foreign('type_town_id')->references('id')->on('type_towns');
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
