<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use App\Models\Sku;
use App\Models\Colores;
use Livewire\Component;

class ProductoFront extends Component
{
    public $producto;
    public $colores;
    public $talles;
    
    public $producto_id;

    public function mount($id)
    {
        $this->producto = Producto::where('id', $id)->firstOrFail();

        $this->colores = Sku::select(['sku.color_id','colores.color'])
        ->join('colores', 'sku.color_id', '=','colores.id')
        ->where('sku.producto_id', '=', $id)
        ->groupBy('sku.color_id','colores.color')
        ->get()
        ->toArray();

      
        // $this->sku = Sku::select(['sku.id',
        // 'sku.stock',
        // 'sku.producto_id',
        // 'productos.nombre',
        // 'colores.color',
        // 'talles.talle'])
        //  ->join('productos', 'sku.producto_id', '=', 'productos.id')
        //  ->join('talles', 'sku.talle_id', '=', 'talles.id')
        //  ->join('colores', 'sku.color_id', '=', 'colores.id')
        //  ->where('productos.nombre', 'like', '%' . $this->search . '%')
        //  ->orderBy($this->sort, $this->order)
        //  ->paginate(5);



  }

    public function render()
    {
        // return view('livewire.producto-front')->layout('layouts.app');
        $producto = $this->producto;
        $colores = $this->colores;
        return view('livewire.producto-front', $producto,$colores);
    }
}
