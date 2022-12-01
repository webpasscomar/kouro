<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FormasdepagoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->sentence(),
            'logo' => $this->faker->sentence(),
        ];
    }
}
