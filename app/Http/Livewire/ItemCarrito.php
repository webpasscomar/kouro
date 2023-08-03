<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ItemCarrito extends Component
{

    public $producto_nombre;
    public $cantidad;
    public $producto_precio;
    public $producto_id;
    public $talle_id;
    public $color_id;
    public $color_nombre;
    public $talle_nombre;
    public $apagar;
    public $index;

    public $mostrar_detalle_index = null;  // variable para tomar el valor del indice del producto 
    public $mostrarDetalle = false; //variable para mostrar detalle del carrito

    public function toogleDetalles($index)
    {
        // tomamos el valor del indice del producto y si es igual al indice mostramos u ocultamos el detalle del producto
        $this->mostrar_detalle_index = $index;
        if ($this->mostrar_detalle_index == $index) {
            $this->mostrarDetalle = !$this->mostrarDetalle;
        }
    }

    public function render()
    {
        return view('livewire.item-carrito');
    }
}
