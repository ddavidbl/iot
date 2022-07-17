<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin',
            'password' => Hash::make('qwerty123'),
            'role' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'userD',
            'email' => 'userD',
            'password' => Hash::make('qwerty321'),
            'role' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Dummy',
            'email' => 'Dummy',
            'password' => Hash::make('qwerty111'),
            'role' => '2',
        ]);
    }
}
