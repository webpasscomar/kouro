<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;

class ProductoFront extends Component
{
    public $producto;
    public $producto_id;

    public function mount($id)
    {
        $this->producto = Producto::where('id', $id)->firstOrFail();
    }

    public function render()
    {
        // return view('livewire.producto-front')->layout('layouts.app');
        $producto = $this->producto;

        return view('livewire.producto-front', $producto);
    }
}
