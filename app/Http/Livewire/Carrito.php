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
        $subTotal = $this->subTotal;
        return view('livewire.carrito',['subTotal' => $subTotal])
        ->extends('layouts.app');
    }



    public function prueba() {
        $this->subTotal = $this->subTotal + 10000;
    }
}
