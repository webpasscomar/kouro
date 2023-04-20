<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Categoria;
use Livewire\WithPagination;

class ProductosFront extends Component
{
    use WithPagination;

    public $categoriaSlug;

    public function mount($categoriaSlug = null)
    {
        $this->categoriaSlug = $categoriaSlug;
    }

    public function render()
    {
        if ($this->categoriaSlug) {
            $categoria = Categoria::where('slug', $this->categoriaSlug)->firstOrFail();
            $productos = $categoria
                ->productos()
                ->where('estado', 1)
                ->orderBy('nombre', 'asc')
                ->paginate(10);
        } else {
            $productos = Producto::where('estado', 1)
                ->orderBy('nombre')
                ->paginate(12);
        }

        $categorias = Categoria::all();
        return view('livewire.productos-front', compact('productos', 'categorias'))
            ->extends('layouts.app');
    }





    
    public function setCategoria($categoriaSlug = null)
    {
        $this->categoriaSlug = $categoriaSlug;
    }

    public function resetCategoria()
    {
        $this->categoriaSlug = null;
    }

    public function getCategoriaProperty()
    {
        return Categoria::where('slug', $this->categoriaSlug)->first();
    }
}
