<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Asegúrate de importar la clase DB
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
            ['name' => 'City 1', 'province_id' => 1],
            ['name' => 'City 2', 'province_id' => 2],
            ['name' => 'City 3', 'province_id' => 3],
            ['name' => 'City 4', 'province_id' => 4],
            ['name' => 'City 5', 'province_id' => 5],
        ]);
    }

}
