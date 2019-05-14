<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Clase dedicada para modelar los campos de la tabla materials_buttresses
 *
 * @author Jhonier Gaviria M. - May. 13-2019
 * @version 1.0.0
 */
class CreateMaterialsButtressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials_buttresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('buttress_id')->unsigned();
            $table->dateTime('date_installation');
            $table->bigInteger('material_id')->unsigned();
            $table->string('price_unit');
            $table->double('quantity');
            $table->bigInteger('type_material_id')->unsigned();
            $table->timestamps();

            $table->foreign('buttress_id')->references('id')->on('buttresses');
            $table->foreign('material_id')->references('id')->on('materials');
            $table->foreign('type_material_id')->references('id')->on('types_materials');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materials_buttresses');
    }
}
