<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PresentacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'presentacion' => $this->faker->sentence(),
            'sigla' => $this->faker->word(),
            'estado' => '1',
        ];
    }
}
