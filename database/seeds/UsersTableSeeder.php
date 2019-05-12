<?php

use App\Http\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Clase dedicada para ingresar registros iniciales de la tabla users
 *
 * @author Jhonier Gaviria M. - May. 12-2019
 * @version 1.0.0
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Andres',
            'last_name' => 'Gallego',
            'nickname' => 'agallego',
            'email' => 'andres.gallego@edeq.com.co',
            'password' => Hash::make('123'),
            'role_id' => Role::ROLE_INSPECTOR,
            'enterprise_id' => 1
        ]);
    }
}
