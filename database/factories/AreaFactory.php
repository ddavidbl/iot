<?php

namespace Database\Factories;

use App\Models\Area;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Area>
 */
class AreaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Area::class;
    public function definition()
    {
        return [
            //
            'suhu' => $this->faker->numberBetween(30, 50),
            'ph' => $this->faker->numberBetween(30, 50),
            'DO' => $this->faker->numberBetween(30, 50),
            'ultrasonic' => $this->faker->numberBetween(30, 50),
            'nilaiKeruh' => $this->faker->numberBetween(30, 50),
            'TDS' => $this->faker->numberBetween(30, 50),
            'konduktifitas' => $this->faker->numberBetween(30, 50),
            'panjang' => $this->faker->numberBetween(30, 50),
            'lebar' => $this->faker->numberBetween(30, 50),
            'volume' => $this->faker->numberBetween(60, 100),
            'device_id' => $this->faker->numberBetween(1, 5),
            // 'created_at'=> $this->faker->date(),
        ];
    }
}
