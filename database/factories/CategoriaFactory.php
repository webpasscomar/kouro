<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'categoriaPadre_id' => '0',
            'idioma_id' => '0',
            'categoria' => $this->faker->word(),
            'descripcion' => $this->faker->paragraph(),
            'slug' => $this->faker->paragraph(),
            'imagen' => $this->faker->sentence(),
            'menu' => '1',
            'orden' => '1',
            'modulo_id' => '1',
            'estado' => '1',

        ];
    }
}
