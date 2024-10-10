<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Talle;
use Livewire\WithPagination;

class Talles extends Component
{
    public $talle, $id_talle, $action = '';

    public $modal = false;
    // public $search;
    // public $sort = 'id';
    // public $order = 'desc';

    // use WithPagination;

    public $talles;
    protected $listeners = ['delete', 'refreshTable'];


    public function refreshTable()
    {
        $this->emit('table');
    }

    protected function rules()
    {
        return [
            'talle' => 'required|max:30',
        ];
    }

    protected function messages()
    {
        return [
            'talle.required' => 'Ingrese un talle',
            'talle.max' => 'Talle inválido'
        ];
    }

    public function render()
    {
        $this->talles = Talle::all();
        // $this->talles = Talle::where('talle', 'like', '%' . $this->search . '%')
        //     ->orderBy($this->sort, $this->order)
        //     ->paginate(10);

        return view('livewire.backend.talles-bs', ['talles' => $this->talles])->layout('layouts.adminlte');
    }

    public function abrirModal()
    {
        $this->modal = true;
        $this->emit('table');
    }

    public function crear()
    {
        $this->action = 'crear';
        $this->abrirModal();
        // $this->limpiarCampos();
    }

    public function cerrarModal()
    {
        $this->modal = false;
        $this->limpiarCampos();
        $this->emit('table');
    }

    public function limpiarCampos()
    {
        $this->talle = '';
        $this->id_talle = '';
        $this->action = '';
        $this->resetErrorBag();
    }

    public function editar($id)
    {
        $this->action = 'editar';
        $talle = Talle::findOrFail($id);
        $this->id_talle = $id;
        $this->talle = $talle->talle;
        $this->abrirModal();
    }

    public function delete($id)
    {
        Talle::find($id)->delete();
        $this->emit('messageDelete');
        $this->emit('table');
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

        // session()->flash(
        //     'message',
        //     $this->id_talle ? '¡Actualización exitosa!' : '¡Alta Exitosa!'
        // );
        // $this->emit('alertSave');
        if ($this->action === 'crear') {
            $this->emit('messageCreate');
        } else if ($this->action === 'editar') {
            $this->emit('messageUpdate');
        }
        $this->cerrarModal();
        // $this->redirect('/admin/talles');
    }

    // public function order($sort)
    // {
    //     if ($this->sort == $sort) {

    //         if ($this->order == 'desc') {
    //             $this->order = 'asc';
    //         } else {
    //             $this->order = 'desc';
    //         }
    //     } else {
    //         $this->sort = $sort;
    //         $this->order = 'asc';
    //     }
    // }
}
