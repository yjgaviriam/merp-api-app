<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Clase dedicada para modelar los campos de la tabla works_groups_types
 *
 * @author Jhonier Gaviria M. - May. 13-2019
 * @version 1.0.0
 */

class CreateWorksGroupsTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works_groups_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('quantity');
            $table->bigInteger('type_worker_id')->unsigned();
            $table->bigInteger('work_group_id')->unsigned();
            $table->timestamps();

            $table->foreign('type_worker_id')->references('id')->on('types_workers');
            $table->foreign('work_group_id')->references('id')->on('works_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works_groups_types');
    }
}
