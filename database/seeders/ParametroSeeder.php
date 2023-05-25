<?php

namespace Database\Seeders;

use App\Models\Parametro;
use Illuminate\Database\Seeder;

class ParametroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parametro = new Parametro();
        $parametro->descripcion = 'Utiliza Carrito de Compra';
        $parametro->default = "S";
        $parametro->detalle = "Utiliza Ecommerce";
        $parametro->relacionados = 0;
        $parametro->valor = "S";
        $parametro->save();

        $parametro1 = new Parametro();
        $parametro1->descripcion = 'Necesita registro para efectuar una Compra';
        $parametro1->default = "N";
        $parametro1->detalle = "Si el valor del campo es S debe registrarse";
        $parametro1->relacionados = 1;
        $parametro1->valor = "N";
        $parametro1->save();

        $parametro2 = new Parametro();
        $parametro2->descripcion = 'Efectua Delivery';
        $parametro2->default = "S";
        $parametro2->detalle = "Realiza entregas a domicilio o solo con retiro en el local";
        $parametro2->relacionados = 1;
        $parametro2->valor = "S";
        $parametro2->save();

        $parametro3 = new Parametro();
        $parametro3->descripcion = 'Pasalela de pago';
        $parametro3->default = "S";
        $parametro3->detalle = "Utiliza Mercadopago para la cobra del pedido";
        $parametro3->relacionados = 1;
        $parametro3->valor = "S";
        $parametro3->save();

        $parametro4 = new Parametro();
        $parametro4->descripcion = 'Costo de entrega por Delivery';
        $parametro4->default = "100";
        $parametro4->detalle = "Costo de envío en el Ecommerce";
        $parametro4->relacionados = 2;
        $parametro4->valor = "100";
        $parametro4->save();

        $parametro5 = new Parametro();
        $parametro5->descripcion = 'Es multiidioma?';
        $parametro5->default = "N";
        $parametro5->detalle = "Tiene otro idioma además de español";
        $parametro5->relacionados = 0;
        $parametro5->valor = "N";
        $parametro5->save();

        $parametro6 = new Parametro();
        $parametro6->descripcion = 'Mensaje de finalización de compra';
        $parametro6->default = "Gracias por su compra";
        $parametro6->detalle = "Mensaje ante finalización correcta de la compra";
        $parametro6->relacionados = 1;
        $parametro6->valor = "Gracias por su compra";
        $parametro6->save();

        $parametro7 = new Parametro();
        $parametro7->descripcion = 'Envasado al Vacio';
        $parametro7->default = "N";
        $parametro7->detalle = "Ofrece envasado al vacio de los productos";
        $parametro7->relacionados = 1;
        $parametro7->valor = "N";
        $parametro7->save();

        $parametro8 = new Parametro();
        $parametro8->descripcion = 'Costo Envasado al Vacio';
        $parametro8->default = "100";
        $parametro8->detalle = "Costo del servicio de envasado al vacio de los productos";
        $parametro8->relacionados = 7;
        $parametro8->valor = "100";
        $parametro8->save();

        $parametro9 = new Parametro();
        $parametro9->descripcion = 'Control de stock';
        $parametro9->default = "S";
        $parametro9->detalle = "Si no hay stock no permite la compra, luego descuenta";
        $parametro9->relacionados = 1;
        $parametro9->valor = "S";
        $parametro9->save();

        $parametro10 = new Parametro();
        $parametro10->descripcion = 'Producto complejo';
        $parametro10->default = "N";
        $parametro10->detalle = "Los productos llevan talle y color";
        $parametro10->relacionados = 1;
        $parametro10->valor = "S";
        $parametro10->save();

        $parametro11 = new Parametro();
        $parametro11->descripcion = 'Aviso sin stock';
        $parametro11->default = "S";
        $parametro11->detalle = "Aviso por mail productos sin stock";
        $parametro11->relacionados = 7;
        $parametro11->valor = "S";
        $parametro11->save();




    }
}
