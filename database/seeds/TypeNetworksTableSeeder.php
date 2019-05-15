<?php

use App\Http\Models\TypeNetwork;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Clase dedicada para ingresar registros iniciales de la tabla type_networks
 *
 * @author Jhonier Gaviria M. - May. 14-2019
 * @version 1.0.0
 */
class TypeNetworksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_networks')->insert([
            'id' => TypeNetwork::TYPE_NETWORK_AERIAL,
            'name' => TypeNetwork::TYPE_NETWORK_AERIAL_NAME
        ]);

        DB::table('type_networks')->insert([
            'id' => TypeNetwork::TYPE_NETWORK_UNDERGROUND,
            'name' => TypeNetwork::TYPE_NETWORK_UNDERGROUND_NAME
        ]);
    }
}
