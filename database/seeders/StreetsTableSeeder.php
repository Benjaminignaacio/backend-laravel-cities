<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StreetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('streets')->insert([
            ['name' => 'Street 1', 'region_id' => 1, 'province_id' => 1, 'city_id' => 1],
            ['name' => 'Street 2', 'region_id' => 1, 'province_id' => 1, 'city_id' => 2],
            ['name' => 'Street 3', 'region_id' => 2, 'province_id' => 2, 'city_id' => 3],
            ['name' => 'Street 4', 'region_id' => 2, 'province_id' => 2, 'city_id' => 4],
            ['name' => 'Street 5', 'region_id' => 3, 'province_id' => 3, 'city_id' => 5],
        ]);
    }
}
