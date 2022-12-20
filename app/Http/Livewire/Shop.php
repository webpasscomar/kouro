<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Producto;
use Livewire\Component;

class Shop extends Component
{
    public $categoria, $slugCategoria, $slugProducto;

    public $mostrar = 'categorias'; // categorias, productos, producto, 
    public $load;

    public function render()
    {
        switch ($this->mostrar) {
            case 'categorias':
                # code...
                $this->categorias = Categoria::all();
                $view = 'livewire.shop';
                break;

            case 'productos':
                # code...
                $this->productos = Producto::all();
                $view = 'livewire.productos';
                break;

            case 'producto':
                # code...
                $this->producto = Producto::find(1);
                $view = 'livewire.producto';
                break;

            default:
                # code...
                $this->categorias = Categoria::all();
                $view = 'livewire.shop';
                break;
        }

        return view($view)->layout('layouts.layout');
    }

    public function mostrar($mostrar)
    {
        $this->mostrar = $mostrar;
    }

    public function listarProductos($slug)
    {
        $this->mostrar = 'productos';
        $this->slugCategoria = $slug;
    }

    public function verProducto($slug)
    {
        $this->mostrar = 'producto';
        $this->slugProducto = $slug;
    }
}
