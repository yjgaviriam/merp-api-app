<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Clase dedicada para modelar los campos de la tabla substations
 *
 * @author Jhonier Gaviria M. - May. 09-2019
 * @version 1.0.0
 */
class CreateSubstationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('substations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 16)->unique();
            $table->string('name', 64)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('substations');
    }
}
