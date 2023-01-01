<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicles')->insert([
            'user_id' => 1,
            'vehicle' => 'Onix',
            'brand' => 'Chevrolet',
            'model' => '2021',
            'version' => '2',
        ]);

        DB::table('vehicles')->insert([
            'user_id' => 2,
            'vehicle' => 'Ferrari',
            'brand' => 'Ferrari',
            'model' => '2022',
            'version' => '1.2',
        ]);

        DB::table('vehicles')->insert([
            'user_id' => 1,
            'vehicle' => 'Uno',
            'brand' => 'Fiat',
            'model' => '2023',
            'version' => '1.0',
        ]);
    }
}
