<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Michael',
            'cpf' => '12345',
            'password' => Hash::make('123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Joao',
            'cpf' => '1234',
            'password' => Hash::make('123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Mikaelly',
            'cpf' => '123',
            'password' => Hash::make('123'),
            'role' => 'admin'
        ]);
    }
}
