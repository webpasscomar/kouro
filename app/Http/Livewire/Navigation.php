<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navigation extends Component
{
   
    public $carrito;
    protected $listeners = ['carrito'];

   
    public function render()
    {
        $this->carrito();
        return view('livewire.navigation');
    }

    
    public function carrito()  {
        if (session('cantidad')) {
             $this->carrito =   session('cantidad');
        }else{
             $this->carrito =  0;
    }    
    }

}
