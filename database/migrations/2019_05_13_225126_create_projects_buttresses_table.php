<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Clase dedicada para modelar los campos de la tabla projects_buttresses
 *
 * @author Jhonier Gaviria M. - May. 13-2019
 * @version 1.0.0
 */
class CreateProjectsButtressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_buttresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('buttress_id')->unsigned();
            $table->bigInteger('project_id')->unsigned();
            $table->timestamps();

            $table->foreign('buttress_id')->references('id')->on('buttresses');
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
        Schema::dropIfExists('projects_buttresses');
    }
}
