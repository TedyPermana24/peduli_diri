<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PerjalananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_user' => 21,
            'tanggal' => $this->faker->date(),
            'jam' => $this->faker->time(),
            'suhu' => $this->faker->numberBetween(32, 40),
            'lokasi' => $this->faker->city()
        ];
    }
}
