<?php

use App\Http\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Clase dedicada para ingresar registros iniciales de la tabla roles
 *
 * @author Jhonier Gaviria M. - May. 12-2019
 * @version 1.0.0
 */
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => Role::ROLE_INSPECTOR,
            'name' => Role::ROLE_INSPECTOR_NAME
        ]);

        DB::table('roles')->insert([
            'id' => Role::ROLE_ASSISTANT_INSPECTOR,
            'name' => Role::ROLE_ASSISTANT_INSPECTOR_NAME
        ]);

        DB::table('roles')->insert([
            'id' => Role::ROLE_SUPERVISOR,
            'name' => Role::ROLE_SUPERVISOR_NAME
        ]);

        DB::table('roles')->insert([
            'id' => Role::ROLE_PLANNER,
            'name' => Role::ROLE_PLANNER_NAME
        ]);
    }
}
