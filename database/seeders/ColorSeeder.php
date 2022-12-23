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
        $color = new Color();
        $color->color = 'Blanco';
        $color->save();

        $color2 = new Color();
        $color2->color = 'Negro';
        $color2->estado = 1;
        $color2->save();

        $color3 = new Color();
        $color3->color = 'Marrón';
        $color3->estado = 1;
        $color3->save();

        $color4 = new Color();
        $color4->color = 'Rojo';
        $color4->estado = 1;
        $color4->save();

        $color5 = new Color();
        $color5->color = 'Azul';
        $color5->estado = 1;
        $color5->save();

        $color6 = new Color();
        $color6->color = 'Amarillo';
        $color6->estado = 1;
        $color6->save();
    }
}
