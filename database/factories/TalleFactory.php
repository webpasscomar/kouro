<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TalleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'talle' => $this->faker->word(),
            'estado' => '1',
        ];
    }
}
