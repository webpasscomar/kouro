<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProductoFactory extends Factory
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
            'nombre' => $nombre,
            'desCorta' => $this->faker->text(120),
            'descLarga' => $this->faker->text(240),
            'codigo' => 0,

            'presentacion_id' => 0,
            'impuesto_id' => 0,

            'precioLista' => $this->faker->randomElement([100, 1000]),

            'precioOferta' => $this->faker->randomElement([100, 1000]),
            'ofertaDesde' => $this->faker->date(),
            'ofertaHasta' => $this->faker->date(),

            'peso' => 0,
            'tamano' => 0,
            'link' => 0,
            'etiquetas' => 0,

            'orden' => 0,
            'unidadVenta' => 0,
            'estado' => $this->faker->randomElement([0, 1])

        ];
    }
}
