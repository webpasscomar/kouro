<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::insert([
            [
                'id' => 1,
                'imagen' => 'blanco.png',
                'color' => 'Blanco',
                'estado' => 1,
                'pcolor' => '#ffffff',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'id' => 2,
                'imagen' => 'negro.png',
                'color' => 'Negro',
                'estado' => 1,
                'pcolor' => '#0d0d0d',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'id' => 3,
                'imagen' => 'rojo.png',
                'color' => 'Rojo',
                'estado' => 1,
                'pcolor' => '#e10909',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'id' => 4,
                'imagen' => 'azul.png',
                'color' => 'Azul',
                'estado' => 1,
                'pcolor' => '#6f84d8',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'id' => 5,
                'imagen' => 'amarillo.png',
                'color' => 'Amarillo',
                'estado' => 1,
                'pcolor' => '#e7eb00',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'id' => 6,
                'imagen' => 'verde.png',
                'color' => 'Verde',
                'estado' => 1,
                'pcolor' => '#5ab03b',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'id' => 7,
                'imagen' => 'rosa.png',
                'color' => 'Rosa',
                'estado' => 1,
                'pcolor' => '#d793b4',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'id' => 8,
                'imagen' =>
                'gris.png',
                'color' => 'Gris',
                'estado' => 1,
                'pcolor' => '#979595',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'id' => 9,
                'imagen' => 'violeta.png',
                'color' => 'Violeta',
                'estado' => 1,
                'pcolor' => '#9419d7',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'id' => 10,
                'imagen' => 'camello.png',
                'color' => 'Camello',
                'estado' => 1,
                'pcolor' => '#f0e1a8',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'id' => 11,
                'imagen' => 'cuero.png',
                'color' => 'Cuero',
                'estado' => 1,
                'pcolor' => '#803c3c',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'id' => 12,
                'imagen' => 'plateado.png',
                'color' => 'Plateado',
                'estado' => 1,
                'pcolor' => '#c4c0c0',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'id' => 13,
                'imagen' => 'naranja.png',
                'color' => 'Naranja',
                'estado' => 1,
                'pcolor' => '#ea6710',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'id' => 14,
                'imagen' => 'suela.png',
                'color' => 'Suela',
                'estado' => 1,
                'pcolor' => '#af6818',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'id' => 15,
                'imagen' => 'metales.png',
                'color' => 'Metales',
                'estado' => 1,
                'pcolor' => '#e4e2e2',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'id' => 16,
                'imagen' =>
                'muti.png',
                'color' => 'MUTI',
                'estado' => 1,
                'pcolor' => '#1fd2ea',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'id' => 17,
                'imagen' => 'dorado.png',
                'color' => 'Dorado',
                'estado' => 1,
                'pcolor' => '#daa520',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'id' => 18,
                'imagen' => 'multicolor.png',
                'color' => 'Multicolor',
                'estado' => 1,
                'pcolor' => '',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
        ]);
    }
}
