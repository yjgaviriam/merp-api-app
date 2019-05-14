<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
* Clase dedicada para modelar los campos de la tabla workforces_materials
*
 * @author Jhonier Gaviria M. - May. 13-2019
* @version 1.0.0
*/
class CreateWorkforcesMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workforces_materials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('material_id')->unsigned();
            $table->bigInteger('workforce_id')->unsigned();
            $table->timestamps();

            $table->foreign('material_id')->references('id')->on('materials');
            $table->foreign('workforce_id')->references('id')->on('workforces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workforces_materials');
    }
}
