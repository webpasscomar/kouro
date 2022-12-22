<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Producto extends Component
{
    public $producto;

    public function render()
    {
        $this->producto = Producto::where('slug', 1)->get();
        return view('livewire.producto');
    }
}
