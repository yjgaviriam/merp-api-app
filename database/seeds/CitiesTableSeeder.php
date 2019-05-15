<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Clase dedicada para ingresar registros iniciales de la tabla cities
 *
 * @author Jhonier Gaviria M. - May. 14-2019
 * @version 1.0.0
 */
class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'id' => 1,
            'name' => 'Armenia',
            'department_id' => 1
        ]);
    }
}
