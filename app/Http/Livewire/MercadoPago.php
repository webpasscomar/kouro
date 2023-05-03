<?php

namespace App\Http\Livewire;

use Livewire\Component;



class MercadoPago extends Component
{

    public $opciones;

    public function mount()
    {
        $this->opciones = session()->get('opciones');
        dd($this->opciones);
    }




    public function render()
    {

            return view('livewire.mercadopago', [
                    'items' => $this->opciones['items'],
                    'total' => $this->opciones['total'],
                    'envio' => $this->opciones['envio'] ]);
    }


}
