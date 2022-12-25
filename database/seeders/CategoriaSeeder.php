<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = new Categoria();
        $categoria->categoriaPadre_id = 0;
        $categoria->categoria = 'Categoria 1';
        $categoria->slug = '/categoria1';
        $categoria->descripcion = 'Esta es la descrición larga de la Categoria 1';
        $categoria->categoria = 'cat01.jpg';
        $categoria->menu = 0;
        $categoria->orden = 6;
        $categoria->estado = 1;
        $categoria->save();

        $categoria1 = new Categoria();
        $categoria1->categoriaPadre_id = 0;
        $categoria1->categoria = 'Categoria 2';
        $categoria1->slug = '/categoria2';
        $categoria1->descripcion = 'Esta es la descrición larga de la Categoria 2';
        $categoria1->categoria = 'cat02.jpg';
        $categoria1->menu = 0;
        $categoria1->orden = 5;
        $categoria1->estado = 1;
        $categoria1->save();

        $categoria2 = new Categoria();
        $categoria2->categoriaPadre_id = 0;
        $categoria2->categoria = 'Categoria 3';
        $categoria2->slug = '/categoria3';
        $categoria2->descripcion = 'Esta es la descrición larga de la Categoria 3';
        $categoria2->categoria = 'cat03.jpg';
        $categoria2->menu = 0;
        $categoria2->orden = 4;
        $categoria2->estado = 1;
        $categoria2->save();

        $categoria3 = new Categoria();
        $categoria3->categoriaPadre_id = 0;
        $categoria3->categoria = 'Categoria 4';
        $categoria3->slug = '/categoria4';
        $categoria3->descripcion = 'Esta es la descrición larga de la Categoria 4';
        $categoria3->categoria = 'cat04.jpg';
        $categoria3->menu = 0;
        $categoria3->orden = 3;
        $categoria3->estado = 1;
        $categoria3->save();

        $categoria4 = new Categoria();
        $categoria4->categoriaPadre_id = 0;
        $categoria4->categoria = 'Categoria 5';
        $categoria4->slug = '/categoria5';
        $categoria4->descripcion = 'Esta es la descrición larga de la Categoria 5';
        $categoria4->categoria = 'cat05.jpg';
        $categoria4->menu = 0;
        $categoria4->orden = 2;
        $categoria4->estado = 1;
        $categoria4->save();

        $categoria5 = new Categoria();
        $categoria5->categoriaPadre_id = 0;
        $categoria5->categoria = 'Categoria 6';
        $categoria5->slug = '/categoria6';
        $categoria5->descripcion = 'Esta es la descrición larga de la Categoria 6';
        $categoria5->categoria = 'cat06.jpg';
        $categoria5->menu = 0;
        $categoria5->orden = 1;
        $categoria5->estado = 1;
        $categoria5->save();
    }
}
