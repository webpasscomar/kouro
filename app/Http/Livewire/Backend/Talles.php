<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Talle;
use Livewire\WithPagination;

class Talles extends Component
{
    public $talle, $id_talle;

    public $modal = false;
    public $search;
    public $sort = 'id';
    public $order = 'desc';

    use WithPagination;

    protected $talles;
    protected $listeners = ['delete'];

    protected $rules = [
        'talle' => 'required|max:30',
    ];

    public function render()
    {
        $this->talles = Talle::where('talle', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->order)
            ->paginate(5);

        return view('livewire.backend.talles', ['talles' => $this->talles]);
    }

    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal()
    {
        $this->modal = true;
    }

    public function cerrarModal()
    {
        $this->modal = false;
    }

    public function limpiarCampos()
    {
        $this->talle = '';
        $this->id_talle = '';
    }

    public function editar($id)
    {
        $talle = Talle::findOrFail($id);
        $this->id_talle = $id;
        $this->talle = $talle->talle;
        $this->abrirModal();
    }

    public function delete($id)
    {
        Talle::find($id)->delete();
    }

    public function guardar()
    {
        $this->validate();
        Talle::updateOrCreate(
            ['id' => $this->id_talle],
            [
                'talle' => $this->talle,
            ]
        );

        //session(['idCarrito' => $this->id_parametro]);

        session()->flash(
            'message',
            $this->id_talle ? '¡Actualización exitosa!' : '¡Alta Exitosa!'
        );
        $this->emit('alertSave');
        $this->cerrarModal();
        $this->limpiarCampos();
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {

            if ($this->order == 'desc') {
                $this->order = 'asc';
            } else {
                $this->order = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->order = 'asc';
        }
    }
}
