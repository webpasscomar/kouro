<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use App\Models\Categoria;
use Livewire\Component;

class Product extends Component
{
    public Producto $producto;
    public Categoria $categoria;

    public $categorias, $talles, $colores;
    public $cantColores, $cantTalles;

    public function mount(Categoria $categoria, Producto $producto)
    {
        $this->producto = $producto;
        $this->categoria = $categoria;
    }

    public function render()
    {
        $producto = $this->producto;

        $categorias = Categoria::all();

        $talles = $producto->talles()->distinct()->get();
        $cantTalles = $talles->count();
        $colores = $producto->colores()->distinct()->get();
        $cantColores = $colores->count();
        //dd($this->producto, $categorias, $talles, $colores, $cantColores, $cantTalles);
        return view('livewire.product');
    }
}
