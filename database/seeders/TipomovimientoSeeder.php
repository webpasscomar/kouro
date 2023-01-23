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
        $tipomovimiento->descripcion = 'Ingreso por compra';
        $tipomovimiento->save();
        $tipomovimiento = new Tipomovimiento();
        $tipomovimiento->descripcion = 'Egreso por Venta';
        $tipomovimiento->save();
        $tipomovimiento = new Tipomovimiento();
        $tipomovimiento->descripcion = 'Ingreso por transferencia de sucursal';
        $tipomovimiento->save();
        $tipomovimiento = new Tipomovimiento();
        $tipomovimiento->descripcion = 'Egreso por transferencia a sucursal';
        $tipomovimiento->save();
        $tipomovimiento = new Tipomovimiento();
        $tipomovimiento->descripcion = 'Egreso por venta de mostrador';
        $tipomovimiento->save();
        $tipomovimiento = new Tipomovimiento();
        $tipomovimiento->descripcion = 'Ingreso por cambio';
        $tipomovimiento->save();
        $tipomovimiento = new Tipomovimiento();
        $tipomovimiento->descripcion = 'Ingreso por cambio';
        $tipomovimiento->save();
        $tipomovimiento = new Tipomovimiento();
        $tipomovimiento->descripcion = 'Egreso por retiro de venta';
        $tipomovimiento->save();
    }
}
