<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estadospedido;

class EstadospedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estadopedido = new Estadospedido();
        $estadopedido->id = 1;
        $estadopedido->nombre = 'Pendiente';
        $estadopedido->save();

        $estadopedido = new Estadospedido();
        $estadopedido->id = 2;
        $estadopedido->nombre = 'En preparacion';
        $estadopedido->save();

        $estadopedido = new Estadospedido();
        $estadopedido->id = 3;
        $estadopedido->nombre = 'Despachado';
        $estadopedido->save();

        $estadopedido = new Estadospedido();
        $estadopedido->id = 4;
        $estadopedido->nombre = 'Entregado';
        $estadopedido->save();

        $estadopedido = new Estadospedido();
        $estadopedido->id = 5;
        $estadopedido->nombre = 'Cancelado';
        $estadopedido->save();




    }
}
