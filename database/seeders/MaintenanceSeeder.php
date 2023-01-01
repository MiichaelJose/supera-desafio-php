<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('maintenances')->insert([
            'vehicle_id' => 1,
            'description' => 'problema no retrovisor',
            'registration_date' => '2021-09-30',
            'analysis_date' => '2021-10-01',
            'start_date' => '2021-10-02',
            'final_date' => '2021-10-03',
        ]);

        DB::table('maintenances')->insert([
            'vehicle_id' => 2,
            'description' => 'problema no painel',
            'registration_date' => '2021-10-04',
            'analysis_date' => '2021-10-05',
            'start_date' => '2021-10-06',
            'final_date' => '2021-10-07',
        ]);

        DB::table('maintenances')->insert([
            'vehicle_id' => 3,
            'description' => 'motor desliga',
            'registration_date' => '2021-10-10',
            'analysis_date' => '2021-10-11',
            'start_date' => '2021-10-12',
            'final_date' => '2021-10-13',
        ]);
    }
}
