<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Carrito extends Component
{
    public $subTotal = 0;
    public $envio = 0;
    public $total = 0;

    public function render()
    {
        return view('livewire.carrito');
    }
}
