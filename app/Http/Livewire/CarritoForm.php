<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CarritoForm extends Component
{

    public $cli_nombre, $cli_apellido, $cli_email, $cli_telefono, $cli_calle, $cli_nro, $cli_piso, $cli_dpto;
    public $cli_prov_id, $cli_loc_id;
    public $formasdeentregas = [], $provincias = [], $localidades, $formasdepagos;

    public $items = [];

    public function mount()
    {
        $this->items = session('items', []);
    }


    public function render()
    {
        return view('livewire.carrito-form');
    }

    public function save()
    {
        $this->validate([
            'cli_nombre' => 'required'
        ]);


        $this->emit('save');
    }
}
