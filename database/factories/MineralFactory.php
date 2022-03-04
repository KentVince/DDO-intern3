<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MineralFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_of_minerals' => $this->faker->title,
            'created_at' => now(),

        ];
    }
}
