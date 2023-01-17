<?php

namespace Database\Seeders;

use App\Models\Formadeentrega;
use Illuminate\Database\Seeder;

class FormasdeentregaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entrega = new Formadeentrega();
        $entrega->nombre = 'Delivery';
        $entrega->estado = 1;
        $entrega->save();

        $entrega1 = new Formadeentrega();
        $entrega1->nombre = 'Retira-Pickup';
        $entrega1->estado = 1;
        $entrega1->save();

        $entrega2 = new Formadeentrega();
        $entrega2->nombre = 'Correo';
        $entrega2->estado = 1;
        $entrega2->save();
    }
}
