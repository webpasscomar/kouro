<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Presentacion
;
class PresentacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $presentacion = new Presentacion();
        $presentacion->presentacion = 'Kilogramos';
        $presentacion->sigla = 'Kg';
        $presentacion->estado = 1;
        $presentacion->save();

        $presentacion1 = new Presentacion();
        $presentacion1->presentacion = 'Unidades';
        $presentacion1->sigla = 'un';
        $presentacion1->estado = 1;
        $presentacion1->save();

        $presentacion2 = new Presentacion();
        $presentacion2->presentacion = 'Litros';
        $presentacion2->sigla = 'L';
        $presentacion2->estado = 1;
        $presentacion2->save();
    }
}
