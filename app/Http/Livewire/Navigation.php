<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navigation extends Component
{

    public $carrito;
    protected $listeners = ['carrito', 'cantidad_carrito'];


    public function render()
    {
        $this->carrito();
        return view('livewire.navigation');
    }


    public function carrito()
    {
        if (session('cantidad')) {
            $this->carrito =   session('cantidad');
        } else {
            $this->carrito =  0;
        }
    }

    //igual que carrito pero sin mostrar mensaje
    public function cantidad_carrito()
    {
        if (session('cantidad')) {
            $this->carrito =   session('cantidad');
        } else {
            $this->carrito =  0;
        }
    }


}
