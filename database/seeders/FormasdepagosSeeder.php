<?php

namespace Database\Seeders;

use App\Models\Formasdepagos;
use Illuminate\Database\Seeder;

class FormasdepagosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pago = new FormasDePagos();
        $pago->nombre = 'Efectivo-Contraentrega';
        $pago->logo = 'pesos.jpg';
        $pago->estado = 1;
        $pago->save();

        $pago1 = new FormasDePagos();
        $pago1->nombre = 'Mercado-Pago';
        $pago1->logo = 'mp.jpg';
        $pago->estado = 0;
        $pago1->save();

        $pago2 = new FormasDePagos();
        $pago2->nombre = 'MODO';
        $pago2->logo = 'modo.jpg';
        $pago->estado = 0;
        $pago2->save();
    }
}
