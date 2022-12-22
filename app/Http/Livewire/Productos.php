<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;

class Productos extends Component
{
    public function render()
    {
        $this->productos = Producto::all();
        //$user = User::find(182, ['id', 'email']);
        return view('livewire.productos');
    }
}
