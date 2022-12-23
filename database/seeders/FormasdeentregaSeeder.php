<?php

namespace Database\Seeders;

use App\Models\Formasdeentrega;
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
        $entrega = new Formasdeentrega();
        $entrega->nombre = 'Delivery';
        $entrega->save();

        $entrega1 = new Formasdeentrega();
        $entrega1->nombre = 'Retira-Pickup';
        $entrega1->save();

        $entrega2 = new Formasdeentrega();
        $entrega2->nombre = 'Correo';
        $entrega2->save();
    }
}
