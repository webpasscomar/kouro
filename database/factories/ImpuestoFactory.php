<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImpuestoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'impuesto' => $this->faker->sentence(),
            'porcentaje' => $this->faker->sentence(),
            'pais_id' => '1',
            'estado' => '1',
        ];
    }
}
