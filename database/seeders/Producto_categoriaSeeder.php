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

        $producto_categoria1 = new Producto_categoria();
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

        $producto_categoria6 = new Producto_categoria();
        $producto_categoria6->producto_id = 7;
        $producto_categoria6->categoria_id = 6;
        $producto_categoria6->save();

        $producto_categoria7 = new Producto_categoria();
        $producto_categoria7->producto_id = 8;
        $producto_categoria7->categoria_id = 6;
        $producto_categoria7->save();

        $producto_categoria8 = new Producto_categoria();
        $producto_categoria8->producto_id = 9;
        $producto_categoria8->categoria_id = 5;
        $producto_categoria8->save();

        $producto_categoria9 = new Producto_categoria();
        $producto_categoria9->producto_id = 7;
        $producto_categoria9->categoria_id = 2;
        $producto_categoria9->save();

        $producto_categoria10 = new Producto_categoria();
        $producto_categoria10->producto_id = 8;
        $producto_categoria10->categoria_id = 3;
        $producto_categoria10->save();

        $producto_categoria11 = new Producto_categoria();
        $producto_categoria11->producto_id = 9;
        $producto_categoria11->categoria_id = 3;
        $producto_categoria11->save();

        $producto_categoria12 = new Producto_categoria();
        $producto_categoria12->producto_id = 10;
        $producto_categoria12->categoria_id = 3;
        $producto_categoria12->save();

        $producto_categoria13 = new Producto_categoria();
        $producto_categoria13->producto_id = 11;
        $producto_categoria13->categoria_id = 3;
        $producto_categoria13->save();

        $producto_categoria14 = new Producto_categoria();
        $producto_categoria14->producto_id = 11;
        $producto_categoria14->categoria_id = 5;
        $producto_categoria14->save();

        $producto_categoria15 = new Producto_categoria();
        $producto_categoria15->producto_id = 11;
        $producto_categoria15->categoria_id = 1;
        $producto_categoria15->save();

        $producto_categoria16 = new Producto_categoria();
        $producto_categoria16->producto_id = 10;
        $producto_categoria16->categoria_id = 1;
        $producto_categoria16->save();

        $producto_categoria17 = new Producto_categoria();
        $producto_categoria17->producto_id = 7;
        $producto_categoria17->categoria_id = 1;
        $producto_categoria17->save();

        $producto_categoria18 = new Producto_categoria();
        $producto_categoria18->producto_id = 10;
        $producto_categoria18->categoria_id = 2;
        $producto_categoria18->save();

        $producto_categoria19 = new Producto_categoria();
        $producto_categoria19->producto_id = 3;
        $producto_categoria19->categoria_id = 3;
        $producto_categoria19->save();

        $producto_categoria20 = new Producto_categoria();
        $producto_categoria20->producto_id = 4;
        $producto_categoria20->categoria_id = 4;
        $producto_categoria20->save();
    }
}
