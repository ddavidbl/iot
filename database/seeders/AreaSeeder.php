<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('areas')->insert([
            'suhu_alat' => 25,
            'kelembapan_udara' => 30,
            'suhu_area' => 35,
            'kelembapan_tanah' => 40,
            'curah_hujan' => 70,
            'arus_air' => 10,
            'solenoid_air' => null,
            'category_id' => $this->faker->numberBetween(1, 5),
        ]);

        DB::table('areas')->insert([
            'suhu_alat' => 30,
            'kelembapan_udara' => 35,
            'suhu_area' => 40,
            'kelembapan_tanah' => 45,
            'curah_hujan' => 80,
            'arus_air' => 20,
            'solenoid_air' => null,
            'category_id' => $this->faker->numberBetween(1, 5),
        ]);
    }
}
