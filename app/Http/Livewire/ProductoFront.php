<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use App\Models\Sku;
use App\Models\Colores;
use App\Models\Talles;
use Livewire\Component;

class ProductoFront extends Component
{

    //variables del formulario
    public $talle_id,$color_id,$producto_id,$cantidad;

    public $producto;
    public $colores;
    public $talles;
    public $disponibles;


    public function mount($id)
    {
        $this->cantidad = 1;
        $this->disponibles = 0;
        $this->talle_id = 0;
        $this->color_id = 0;
        $this->producto_id = $id;
        $this->producto = Producto::where('id', $id)->firstOrFail();



        $this->colores = Sku::select(['sku.color_id','colores.color'])
        ->join('colores', 'sku.color_id', '=','colores.id')
        ->where('sku.producto_id', '=', $id)
        ->groupBy('sku.color_id','colores.color')
        ->get()
        ->toArray();


        $this->talles = Sku::select(['sku.talle_id','talles.talle'])
        ->join('talles', 'sku.talle_id', '=','talles.id')
        ->where('sku.producto_id', '=', $id)
        ->groupBy('sku.talle_id','talles.talle')
        ->get()
        ->toArray();
    }

    public function incrementa()
    {
        $this->cantidad = $this->cantidad +1;
        $this->checkstock();
    }


    public function decrementa()
    {
        if ($this->cantidad > 1) {
            $this->cantidad = $this->cantidad -1;
            $this->checkstock();
        }
    }


    public function checkstock() {
        $dispo = 0;
        if ($this->talle_id > 0 && $this->color_id > 0 && $this->cantidad > 0) {
           $dispo = Sku::where('producto_id',$this->producto_id)
           ->where('talle_id',$this->talle_id)
           ->where('color_id',$this->color_id)
           ->value('stock');
           $this->disponibles = $dispo;

       }

    }


    public function agregarcarrito() {

        //grabamos en la session
        //nuevo item
        ////verifico precio a tomar
        $ldate = date('Y-m-d H:i:s');
        $precio =0;
        if(is_null($this->producto->ofertaDesde) or is_null($this->producto->ofertaHasta)) {
            $precio =  $this->poducto->precioLista;
        }else{
            if ($this->producto->ofertaDesde <= $ldate and $this->producto->ofertaHasta >= $ldate) {
                $precio =  $this->producto->precioOferta;
            }else{
                $precio =  $this->producto->precioLista;
            }
        }

        $item=['cantidad' => $this->cantidad,
                'talle_id' => $this->talle_id,
                'talle_nombre' => $this->talle->talles,
                'color_id' => $this->color_id,
                'color_nombre' => $this->colores->color,
                'producto_id' => $this->producto_id,
                'producto_nombre' => $this->producto->nombre,
                'producto_precio' => $precio,

            ];
        //tomo en items lo que tiene la sesion
        $items = session('items');

        //le agrego el nuevo item
        //si no es el primero
        if ($items) {
            array_push($items,$item);
        }else{
            $items = [$item];
        }


        //cuento la cantidad
        $cantitems = count($items);

        //actualizo la sesion los items y la cantidad total de items
        session(['items' => $items, 'cantidad' => $cantitems]);

        //envio al icono de cart
        $this->emit('carrito',['mensaje' => 'existe session', 'cantidad' => session('cantidad') ]);

    }

    public function render()
    {
        // return view('livewire.producto-front')->layout('layouts.app');
        $producto = $this->producto;
        $colores  = $this->colores;
        $talles   = $this->talles;
        return view('livewire.producto-front', $producto,$colores,$talles);
    }
}
