<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Clase dedicada para modelar los campos de la tabla workforces_buttresses
 *
 * @author Jhonier Gaviria M. - May. 13-2019
 * @version 1.0.0
 */
class CreateWorkforcesButtressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workforces_buttresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('buttress_id')->unsigned();
            $table->dateTime('date_installation');
            $table->decimal('price_unit');
            $table->decimal('quantity');
            $table->bigInteger('workforce_id')->unsigned();
            $table->timestamps();

            $table->foreign('buttress_id')->references('id')->on('buttresses');
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
        Schema::dropIfExists('workforces_buttresses');
    }
}
