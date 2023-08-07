<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto_imagen;



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
    public $imagen_producto;

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

        $dato_imagen = Producto_imagen::select(['productos_imagenes.file_path'])
        ->where('productos_imagenes.producto_id', '=', $this->producto_id)
        ->where('productos_imagenes.color_id', '=', $this->color_id)
        ->First();
        if ($dato_imagen) {
            $a = basename($dato_imagen->file_path);
            $this->imagen_producto = $a;
        }

        return view('livewire.item-carrito');
    }
}
