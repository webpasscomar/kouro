<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::insert(
            [
                [
                    'categoriaPadre_id' => 0,
                    'categoria' => 'Categoria 1',
                    'slug' => 'categoria1',
                    'descripcion' => 'Esta es la descrición larga de la Categoria 1',
                    'imagen' => 'cat01.jpg',
                    'menu' => 0,
                    'orden' => 1,
                    'estado' => 1
                ],
                [
                    'categoriaPadre_id' => 0,
                    'categoria' => 'Categoria 2',
                    'slug' => 'categoria2',
                    'descripcion' => 'Esta es la descrición larga de la Categoria 2',
                    'imagen' => 'cat02.jpg',
                    'menu' => 0,
                    'orden' => 2,
                    'estado' => 1
                ],
                [
                    'categoriaPadre_id' => 0,
                    'categoria' => 'Categoria 3',
                    'slug' => 'categoria3',
                    'descripcion' => 'Esta es la descrición larga de la Categoria 3',
                    'imagen' => 'cat03.jpg',
                    'menu' => 0,
                    'orden' => 3,
                    'estado' => 1
                ],
                [
                    'categoriaPadre_id' => 0,
                    'categoria' => 'Categoria 4',
                    'slug' => 'categoria4',
                    'descripcion' => 'Esta es la descrición larga de la Categoria 4',
                    'imagen' => 'cat04.jpg',
                    'menu' => 0,
                    'orden' => 4,
                    'estado' => 1
                ],
                [
                    'categoriaPadre_id' => 0,
                    'categoria' => 'Categoria 5',
                    'slug' => 'categoria5',
                    'descripcion' => 'Esta es la descrición larga de la Categoria 5',
                    'imagen' => 'cat05.jpg',
                    'menu' => 0,
                    'orden' => 5,
                    'estado' => 1
                ],
                [
                    'categoriaPadre_id' => 0,
                    'categoria' => 'Categoria 6',
                    'slug' => 'categoria6',
                    'descripcion' => 'Esta es la descrición larga de la Categoria 6',
                    'imagen' => 'cat06.jpg',
                    'menu' => 0,
                    'orden' => 6,
                    'estado' => 1
                ],
                [
                    'categoriaPadre_id' => 0,
                    'categoria' => 'Categoria 7',
                    'slug' => 'categoria7',
                    'descripcion' => 'Esta es la descrición larga de la Categoria 7',
                    'imagen' => 'cat07.jpg',
                    'menu' => 0,
                    'orden' => 7,
                    'estado' => 1
                ]
            ]
        );

        // $categoria = new Category();
        // $categoria->categoriaPadre_id = 0;
        // $categoria->categoria = 'Categoria 1';
        // $categoria->slug = '/categoria1';
        // $categoria->descripcion = 'Esta es la descrición larga de la Categoria 1';
        // $categoria->imagen = 'cat01';
        // $categoria->menu = 0;
        // $categoria->orden = 6;
        // $categoria->estado = 1;
        // $categoria->save();


    }
}
