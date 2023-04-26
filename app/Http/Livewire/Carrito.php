<?php

namespace App\Http\Livewire;

use Livewire\Component;




class Carrito extends Component
{
    public $subTotal = 0;
    public $envio = 0;
    public $total = 0;


    protected $listeners = ['delete'];


    public function render()
    {
        $subTotal = $this->subTotal;
        return view('livewire.carrito',['subTotal' => $subTotal]);
        // ->extends('layouts.app');
    }



    //borra items del carrito
    public function delete($idproducto,$idtalle,$idcolor) {

            $items = session('items');
            if ($items) {
                $cantitems = count($items);

                for ($i = 0; $i < $cantitems; $i++) {
                    if ($items[$i]['producto_id'] == $idproducto &&
                        $items[$i]['talle_id'] == $idtalle &&
                        $items[$i]['color_id'] == $idcolor  ){

                        //elimino el elemento del array
                        unset($items[$i]);
                        //reordeno indices para que no queden espacios en null
                        $items=array_values($items);


                    }
                }
            //cuento la cantidad
            $cantitems = count($items);
            $subtotal = 0;
            for ($i = 0; $i < $cantitems; $i++) {
                $subtotal += $items[$i]['total_item'];
            }

            //ver tema datop envio
            if ($items) {
                $envio = 150;
            }else{
                $envio = 0;
            }


            //actualizo la sesion los items y la cantidad total de items
            session(['items' => $items, 'cantidad' => $cantitems, 'sub_total' => $subtotal, 'envio' => $envio]);

            //envio al icono de cart
            $this->emit('carrito',['mensaje' => 'Se elimino  el producto al carrito', 'cantidad' => session('cantidad') ]);

        }


    }
}
