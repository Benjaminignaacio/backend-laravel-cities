<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Asegúrate de importar la clase DB
class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->insert([
            ['name' => 'Province 1', 'region_id' => 1],
            ['name' => 'Province 2', 'region_id' => 1],
            ['name' => 'Province 3', 'region_id' => 2],
            ['name' => 'Province 4', 'region_id' => 2],
            ['name' => 'Province 5', 'region_id' => 3],
        ]);
    }

}
