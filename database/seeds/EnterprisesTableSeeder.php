<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Clase dedicada para ingresar registros iniciales de la tabla enterprises
 *
 * @author Jhonier Gaviria M. - May. 12-2019
 * @version 1.0.0
 */
class EnterprisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enterprises')->insert([
            'id' => 1,
            'name' => 'Edeq',
            'nit' => '800.052.640-9'
        ]);
    }
}
