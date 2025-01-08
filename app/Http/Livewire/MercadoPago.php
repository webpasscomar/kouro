<?php

namespace App\Http\Livewire;

use Livewire\Component;



class MercadoPago extends Component
{

    public $opciones;

    public function mount()
    {
        $this->opciones = session()->get('opciones');

        if ($this->opciones == null) {
            $this->opciones['items'] = [];
            $this->opciones['total'] = 0;
            $this->opciones['envio'] = 0;
            $this->opciones['cant_art'] = 0;
            $this->opciones['nro_pedido'] = 0;
        }
    }




    public function render()
    {


        return view('livewire.mercadopago', [
            'items' => $this->opciones['items'],
            'total' => $this->opciones['total'],
            'envio' => $this->opciones['envio'],
            'cant_art' => $this->opciones['cant_art'],
            'nro_pedido' => $this->opciones['nro_pedido'],
        ]);
    }
}
