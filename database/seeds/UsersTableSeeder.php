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
            'email' => 'andres.gallego@edeq.com.co',
            'enterprise_id' => 1,
            'last_name' => 'Gallego',
            'name' => 'Andres',
            'password' => Hash::make('123'),
            'role_id' => Role::ROLE_INSPECTOR,
            'username' => 'agallego'
        ]);
    }
}
