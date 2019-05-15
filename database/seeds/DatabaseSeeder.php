<?php

use Illuminate\Database\Seeder;

/**
 * Clase dedicada para llamar los seeders que realizaran los registros iniciales de cada tabla requerida
 *
 * @author Jhonier Gaviria M. - May. 12-2019
 * @version 1.0.0
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('RolesTableSeeder');
        $this->call('EnterprisesTableSeeder');
        $this->call('UsersTableSeeder');
        $this->call('DepartmentsTableSeeder');
        $this->call('CitiesTableSeeder');
        $this->call('TypesNetworksTableSeeder');
        $this->call('TypesTownsTableSeeder');
    }
}
