<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Clase dedicada para modelar los campos de la tabla users
 *
 * @author Jhonier Gaviria M. - May. 12-2019
 * @version 1.0.0
 */
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email', 255)->unique();
            $table->bigInteger('enterprise_id')->unsigned();
            $table->string('last_name', 64);
            $table->string('name', 64);
            $table->string('password', 255);
            $table->bigInteger('role_id')->unsigned();
            $table->string('username', 64);
            $table->timestamps();

            $table->foreign('enterprise_id')->references('id')->on('enterprises');
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
