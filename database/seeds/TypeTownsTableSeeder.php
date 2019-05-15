<?php

use App\Http\Models\TypeTown;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Clase dedicada para ingresar registros iniciales de la tabla type_towns
 *
 * @author Jhonier Gaviria M. - May. 14-2019
 * @version 1.0.0
 */
class TypeTownsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_towns')->insert([
            'id' => TypeTown::TYPE_TOWN_VILLAGE,
            'name' => TypeTown::TYPE_TOWN_VILLAGE_NAME
        ]);

        DB::table('type_towns')->insert([
            'id' => TypeTown::TYPE_TOWN_NEIGHBORHOOD,
            'name' => TypeTown::TYPE_TOWN_NEIGHBORHOOD_NAME
        ]);
    }
}
