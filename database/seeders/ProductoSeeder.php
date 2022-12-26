<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $producto = new Producto();
        $producto->nombre = 'Producto 1';
        $producto->desCorta = 'Esta es la descripción corta del producto 1';
        $producto->descLarga = ' ';
        $producto->codigo = 'CODPROD01';
        $producto->presentacion_id = 1;
        $producto->precioLista = 100;    
        $producto->precioOferta = 0;
        $producto->peso = 0;
        $producto->tamano = 0;
        $producto->link = ' ';
        $producto->orden = 1;
        $producto->unidadVenta = 1;
        $producto->destacar = 1;   
        $producto->estado = 1;
        $producto->save();

        $producto1 = new Producto();
        $producto1->nombre = 'Producto 2';
        $producto1->desCorta = 'Esta es la descripción corta del producto 2';
        $producto1->descLarga = ' ';
        $producto1->codigo = 'CODPROD02';
        $producto1->presentacion_id = 1;
        $producto1->precioLista = 200;    
        $producto1->precioOferta = 0;
        $producto1->peso = 0;
        $producto1->tamano = 0;
        $producto1->link = ' ';
        $producto1->orden = 2;
        $producto1->unidadVenta = 1;
        $producto1->destacar = 0;   
        $producto1->estado = 1;
        $producto1->save();

        $producto2 = new Producto();
        $producto2->nombre = 'Producto 3';
        $producto2->desCorta = 'Esta es la descripción corta del producto 3';
        $producto2->descLarga = ' ';
        $producto2->codigo = 'CODPROD03';
        $producto2->presentacion_id = 1;
        $producto2->precioLista = 300;    
        $producto2->precioOferta = 0;
        $producto2->peso = 0;
        $producto2->tamano = 0;
        $producto2->link = ' ';
        $producto2->orden = 3;
        $producto2->unidadVenta = 1;
        $producto2->destacar = 1;   
        $producto2->estado = 1;
        $producto2->save();

        $producto3 = new Producto();
        $producto3->nombre = 'Producto 4';
        $producto3->desCorta = 'Esta es la descripción corta del producto 4';
        $producto3->descLarga = ' ';
        $producto3->codigo = 'CODPROD04';
        $producto3->presentacion_id = 1;
        $producto3->precioLista = 400;    
        $producto3->precioOferta = 0;
        $producto3->peso = 0;
        $producto3->tamano = 0;
        $producto3->link = ' ';
        $producto3->orden = 4;
        $producto3->unidadVenta = 1;
        $producto3->destacar = 0;   
        $producto3->estado = 1;
        $producto3->save();

        $producto4 = new Producto();
        $producto4->nombre = 'Producto 5';
        $producto4->desCorta = 'Esta es la descripción corta del producto 5';
        $producto4->descLarga = ' ';
        $producto4->codigo = 'CODPROD05';
        $producto4->presentacion_id = 1;
        $producto4->precioLista = 500;    
        $producto4->precioOferta = 0;
        $producto4->peso = 0;
        $producto4->tamano = 0;
        $producto4->link = ' ';
        $producto4->orden = 5;
        $producto4->unidadVenta = 1;
        $producto4->destacar = 1;   
        $producto4->estado = 1;
        $producto4->save();

        $producto5 = new Producto();
        $producto5->nombre = 'Producto 6';
        $producto5->desCorta = 'Esta es la descripción corta del producto 6';
        $producto5->descLarga = ' ';
        $producto5->codigo = 'CODPROD06';
        $producto5->presentacion_id = 1;
        $producto5->precioLista = 600;    
        $producto5->precioOferta = 0;
        $producto5->peso = 0;
        $producto5->tamano = 0;
        $producto5->link = ' ';
        $producto5->orden = 6;
        $producto5->unidadVenta = 1;
        $producto5->destacar = 0;   
        $producto5->estado = 1;
        $producto5->save();

        $producto6 = new Producto();
        $producto6->nombre = 'Producto 7';
        $producto6->desCorta = 'Esta es la descripción corta del producto 7';
        $producto6->descLarga = ' ';
        $producto6->codigo = 'CODPROD07';
        $producto6->presentacion_id = 1;
        $producto6->precioLista = 700;    
        $producto6->precioOferta = 0;
        $producto6->peso = 0;
        $producto6->tamano = 0;
        $producto6->link = ' ';
        $producto6->orden = 7;
        $producto6->unidadVenta = 1;
        $producto6->destacar = 0;   
        $producto6->estado = 1;
        $producto6->save();
  
        $producto7 = new Producto();
        $producto7->nombre = 'Producto 8';
        $producto7->desCorta = 'Esta es la descripción corta del producto 8';
        $producto7->descLarga = ' ';
        $producto7->codigo = 'CODPROD08';
        $producto7->presentacion_id = 1;
        $producto7->precioLista = 800;    
        $producto7->precioOferta = 0;
        $producto7->peso = 0;
        $producto7->tamano = 0;
        $producto7->link = ' ';
        $producto7->orden = 7;
        $producto7->unidadVenta = 1;
        $producto7->destacar = 0;   
        $producto7->estado = 1;
        $producto7->save();

        $producto8 = new Producto();
        $producto8->nombre = 'Producto 9';
        $producto8->desCorta = 'Esta es la descripción corta del producto 9';
        $producto8->descLarga = ' ';
        $producto8->codigo = 'CODPROD09';
        $producto8->presentacion_id = 1;
        $producto8->precioLista = 600;    
        $producto8->precioOferta = 0;
        $producto8->peso = 0;
        $producto8->tamano = 0;
        $producto8->link = ' ';
        $producto8->orden = 9;
        $producto8->unidadVenta = 1;
        $producto8->destacar = 0;   
        $producto8->estado = 1;
        $producto8->save();
}
}