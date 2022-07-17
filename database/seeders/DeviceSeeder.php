<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('devices')->insert([
            'lokasi' => 'Alpha',
        ]);
        DB::table('devices')->insert([
            'lokasi' => 'Bravo',
        ]);
        DB::table('devices')->insert([
            'lokasi' => 'Charli',
        ]);
        DB::table('devices')->insert([
            'lokasi' => 'Delta',
        ]);
        DB::table('devices')->insert([
            'lokasi' => 'Echo',
        ]);
    }
}
