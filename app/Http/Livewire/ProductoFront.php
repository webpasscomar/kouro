<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Sku;
use App\Models\Color;
use App\Models\Talle;

use Livewire\Component;

class ProductoFront extends Component
{

    //variables del formulario
    public $talle_id, $color_id, $producto_id, $cantidad;

    public $producto;
    public $colores;
    public $talles;
    public $disponibles;
    public $categorias;


    public function mount($id)
    {
        $this->cantidad = 1;
        $this->disponibles = 0;
        $this->talle_id = 0;
        $this->color_id = 0;
        $this->producto_id = $id;
        $this->producto = Producto::where('id', $id)->firstOrFail();



        $this->colores = Sku::select(['sku.color_id', 'colores.color'])
            ->join('colores', 'sku.color_id', '=', 'colores.id')
            ->where('sku.producto_id', '=', $id)
            ->groupBy('sku.color_id', 'colores.color')
            ->get()
            ->toArray();


        $this->talles = Sku::select(['sku.talle_id', 'talles.talle'])
            ->join('talles', 'sku.talle_id', '=', 'talles.id')
            ->where('sku.producto_id', '=', $id)
            ->groupBy('sku.talle_id', 'talles.talle')
            ->get()
            ->toArray();

        $this->categorias = Categoria::where('estado', 1)
            ->orderBy('categoria')
            ->get()
            ->toArray();
        // $this->categorias = Categoria::where('estado', 1)->get();
    }

    public function incrementa()
    {
        $this->cantidad = $this->cantidad + 1;
        if (parametro(10) === 'S') {
            $this->checkstock();
        }
    }


    public function decrementa()
    {
        if ($this->cantidad > 1) {
            $this->cantidad = $this->cantidad - 1;
            if (parametro(10) === 'S') {
                $this->checkstock();
            }
        }
    }


    public function checkstock()
    {


        ///si el parametro controla stock esta habilitado
        if (parametro(10) === 'S') {
            $dispo = 0;
            if ($this->talle_id > 0 && $this->color_id > 0 && $this->cantidad > 0) {
                $dispo = Sku::where('producto_id', $this->producto_id)
                    ->where('talle_id', $this->talle_id)
                    ->where('color_id', $this->color_id)
                    ->value('stock');
                $this->disponibles = $dispo;
            } else {
                $this->disponibles = 1000000;
            }
        }
    }


    public function agregarcarrito()
    {

        //grabamos en la session
        //nuevo item
        ////verifico precio a tomar
        $ldate = date('Y-m-d H:i:s');
        $precio = 0;
        if (is_null($this->producto->ofertaDesde) or is_null($this->producto->ofertaHasta)) {
            $precio =  $this->producto->precioLista;
        } else {
            if ($this->producto->ofertaDesde <= $ldate and $this->producto->ofertaHasta >= $ldate) {
                $precio =  $this->producto->precioOferta;
            } else {
                $precio =  $this->producto->precioLista;
            }
        }

        $talle_nombre = Talle::where('id', $this->talle_id)
            ->value('talle');

        $color_nombre = Color::where('id', $this->color_id)
            ->value('color');

        $item = [
            'cantidad' => $this->cantidad,
            'talle_id' => $this->talle_id,
            'talle_nombre' => $talle_nombre,
            'color_id' => $this->color_id,
            'color_nombre' => $color_nombre,
            'producto_id' => $this->producto_id,
            'producto_nombre' => $this->producto->nombre,
            'producto_precio' => $precio,
            'total_item' => $this->cantidad * $precio

        ];
        //tomo en items lo que tiene la sesion
        $items = session('items');

        //si no es el primero verifico
        //si ya eligio algun producto igual
        //y solo le cambio cantidad y subtotal
        if ($items) {
            $cantitems = count($items);
            $esta = 0;
            for ($i = 0; $i < $cantitems; $i++) {
                if (
                    $items[$i]['producto_id'] == $this->producto_id &&
                    $items[$i]['talle_id'] == $this->talle_id &&
                    $items[$i]['color_id'] == $this->color_id
                ) {

                    $items[$i]['cantidad'] = $items[$i]['cantidad'] + $this->cantidad;
                    $items[$i]['totasl_item'] = $items[$i]['cantidad'] + $precio;
                    $esta = 1;
                }
            }
            //no esta en la lista
            //lo agrego
            if ($esta == 0) {
                array_push($items, $item);
            }
        } else {  //es el primer articulo
            $items = [$item];
        }


        //cuento la cantidad
        $cantitems = count($items);
        $subtotal = 0;
        for ($i = 0; $i < $cantitems; $i++) {
            $subtotal += $items[$i]['total_item'];
        }

        //actualizo la sesion los items y la cantidad total de items
        session(['items' => $items, 'cantidad' => $cantitems, 'sub_total' => $subtotal]);

        //envio al icono de cart
        $this->emit('carrito', ['mensaje' => 'Se agrego el producto al carrito', 'cantidad' => session('cantidad')]);
    }

    public function render()
    {
        // return view('livewire.producto-front')->layout('layouts.app');
        $producto = $this->producto;
        $colores  = $this->colores;
        $talles   = $this->talles;
        $categorias = $this->categorias;
        // dd($categorias);
        return view('livewire.producto-front', $producto, $colores, $talles, $this->categorias);
    }
}
