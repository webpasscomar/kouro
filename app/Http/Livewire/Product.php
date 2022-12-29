<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Sku;
use Livewire\Component;

class Product extends Component
{
    public Producto $producto;
    public Categoria $categoria;

    public $categorias, $talles, $colores;
    public $cantColores, $cantTalles;
    public $talle, $color, $sku;

    public function mount(Categoria $categoria, Producto $producto)
    {
        $this->producto = $producto;
        $this->categoria = $categoria;
    }

    public function render()
    {
        $producto = $this->producto;

        $this->categorias = Categoria::all();
        $this->talles = $producto->talles()->distinct()->get();
        $this->colores = $producto->colores()->distinct()->get();

        return view('livewire.product');
    }

    public function agregarAlCarrito()
    {
        // Obtener el id del SKU
        $this->sku = SKU::where('producto_id', $this->producto->id)
            ->where('talle_id', $this->talle)
            ->where('color_id', $this->color)
            ->first();

        // Agregarlo al carrito

        dd($this->talle, $this->color, $this->producto->id, $this->sku);
        //session(['idCarrito' => $this->id_parametro]);
    }
}
