<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto_categoria;

class Producto_categoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $producto_categoria = new Producto_categoria();
        $producto_categoria->producto_id = 1;
        $producto_categoria->categoria_id = 4;
        $producto_categoria->save();

        /* $producto_categoria1 = new Producto_categoria();
        $producto_categoria1->producto_id = 2;
        $producto_categoria1->categoria_id = 3;
        $producto_categoria1->save();

        $producto_categoria2 = new Producto_categoria();
        $producto_categoria2->producto_id = 3;
        $producto_categoria2->categoria_id = 1;
        $producto_categoria2->save();

        $producto_categoria3 = new Producto_categoria();
        $producto_categoria3->producto_id = 4;
        $producto_categoria3->categoria_id = 2;
        $producto_categoria3->save();

        $producto_categoria4 = new Producto_categoria();
        $producto_categoria4->producto_id = 5;
        $producto_categoria4->categoria_id = 6;
        $producto_categoria4->save();

        $producto_categoria5 = new Producto_categoria();
        $producto_categoria5->producto_id = 6;
        $producto_categoria5->categoria_id = 6;
        $producto_categoria5->save();
 */
    }
}
