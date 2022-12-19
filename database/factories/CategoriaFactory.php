<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $nombre = $this->faker->unique->word(20);

        return [
            'categoriaPadre_id' => '0',
            'categoria' => $nombre,
            'slug' => Str::slug($nombre),
            'descripcion' => $this->faker->paragraph(),
            'imagen' => $this->faker->sentence(),
            'menu' => '1',
            'orden' => '1',
            'estado' => '1',

        ];
    }
}
