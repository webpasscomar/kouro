<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tipomovimiento;

class TipomovimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipomovimiento = new Tipomovimiento();
        $tipomovimiento->id = 1;
        $tipomovimiento->descripcion = 'Ingreso por compra'; //1
        $tipomovimiento->save();

        $tipomovimiento->id = 2;
        $tipomovimiento = new Tipomovimiento();
        $tipomovimiento->descripcion = 'Egreso por Venta'; //2
        $tipomovimiento->save();

        $tipomovimiento->id = 3;
        $tipomovimiento = new Tipomovimiento();
        $tipomovimiento->descripcion = 'Ingreso por transferencia de sucursal';  //3
        $tipomovimiento->save();

        $tipomovimiento->id = 4;
        $tipomovimiento = new Tipomovimiento();
        $tipomovimiento->descripcion = 'Egreso por transferencia a sucursal'; //4
        $tipomovimiento->save();

        $tipomovimiento->id = 5;
        $tipomovimiento = new Tipomovimiento();
        $tipomovimiento->descripcion = 'Egreso por venta de mostrador'; //5
        $tipomovimiento->save();

        $tipomovimiento->id = 6;
        $tipomovimiento = new Tipomovimiento();
        $tipomovimiento->descripcion = 'Ingreso por cambio'; //6
        $tipomovimiento->save();

        $tipomovimiento->id = 7;
        $tipomovimiento = new Tipomovimiento();
        $tipomovimiento->descripcion = 'Ingreso por cambio'; //7
        $tipomovimiento->save();

        $tipomovimiento->id = 8;
        $tipomovimiento = new Tipomovimiento();
        $tipomovimiento->descripcion = 'Egreso por retiro de venta'; //8
        $tipomovimiento->save();

        $tipomovimiento->id = 9;
        $tipomovimiento = new Tipomovimiento();
        $tipomovimiento->descripcion = 'Ingreso por Devolucion';  //9
        $tipomovimiento->save();
        
    }
}
