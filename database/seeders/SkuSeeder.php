<?php

namespace Database\Seeders;

use App\Models\Sku;
use Illuminate\Database\Seeder;


class SkuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Talles 14 - Colores 6 

        $sku0 = new Sku();
        $sku0->producto_id = 1;
        $sku0->talle_id = 1;
        $sku0->color_id = 1;
        $sku0->save();

        $sku1 = new Sku();
        $sku1->producto_id = 1;
        $sku1->talle_id = 1;
        $sku1->color_id = 2;
        $sku1->save();

        $sku2 = new Sku();
        $sku2->producto_id = 1;
        $sku2->talle_id = 1;
        $sku2->color_id = 3;
        $sku2->save();

        $sku3 = new Sku();
        $sku3->producto_id = 1;
        $sku3->talle_id = 2;
        $sku3->color_id = 1;
        $sku3->save();

        $sku4 = new Sku();
        $sku4->producto_id = 1;
        $sku4->talle_id = 2;
        $sku4->color_id = 2;
        $sku4->save();

        $sku5 = new Sku();
        $sku5->producto_id = 1;
        $sku5->talle_id = 2;
        $sku5->color_id = 3;
        $sku5->save();





        $sku6 = new Sku();
        $sku6->producto_id = 2;
        $sku6->talle_id = 1;
        $sku6->color_id = 1;
        $sku6->save();

        $sku7 = new Sku();
        $sku7->producto_id = 2;
        $sku7->talle_id = 1;
        $sku7->color_id = 2;
        $sku7->save();

        $sku8 = new Sku();
        $sku8->producto_id = 3;
        $sku8->talle_id = 1;
        $sku8->color_id = 3;
        $sku8->save();

        $sku9 = new Sku();
        $sku9->producto_id = 3;
        $sku9->talle_id = 2;
        $sku9->color_id = 1;
        $sku9->save();

        $sku10 = new Sku();
        $sku10->producto_id = 4;
        $sku10->talle_id = 2;
        $sku10->color_id = 2;
        $sku10->save();

        $sku11 = new Sku();
        $sku11->producto_id = 4;
        $sku11->talle_id = 2;
        $sku11->color_id = 3;
        $sku11->save();





        $sku12 = new Sku();
        $sku12->producto_id = 5;
        $sku12->save();

        $sku13 = new Sku();
        $sku13->producto_id = 6;
        $sku13->save();

        $sku14 = new Sku();
        $sku14->producto_id = 7;
        $sku14->save();

        $sku15 = new Sku();
        $sku15->producto_id = 8;
        $sku15->save();

        $sku16 = new Sku();
        $sku16->producto_id = 9;
        $sku16->save();

        $sku17 = new Sku();
        $sku17->producto_id = 10;
        $sku17->save();

        $sku18 = new Sku();
        $sku18->producto_id = 11;
        $sku18->save();
    }
}
