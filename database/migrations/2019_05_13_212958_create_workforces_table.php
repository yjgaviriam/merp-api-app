<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Clase dedicada para modelar los campos de la tabla workforces
 *
 * @author Jhonier Gaviria M. - May. 13-2019
 * @version 1.0.0
 */
class CreateWorkforcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workforces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->string('code');
            $table->decimal('price');
            $table->bigInteger('structure_id')->unsigned();
            $table->timestamps();

            $table->foreign('structure_id')->references('id')->on('structures');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workforces');
    }
}
