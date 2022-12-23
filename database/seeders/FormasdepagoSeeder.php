<?php

namespace Database\Seeders;

use App\Models\Formasdepago;
use Illuminate\Database\Seeder;

class FormasdepagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pago = new FormasDePago();
        $pago->nombre = 'Efectivo-Contraentrega';
        $pago->logo = 'pesos.jpg';
        $pago->save();

        $pago1 = new FormasDePago();
        $pago1->nombre = 'Mercado-Pago';
        $pago1->logo = 'mp.jpg';
        $pago1->save();

        $pago2 = new FormasDePago();
        $pago2->nombre = 'MODO';
        $pago2->logo = 'modo.jpg';
        $pago2->save();
    }
}
