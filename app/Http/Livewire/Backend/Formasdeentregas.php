<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Formadeentrega;
use Livewire\WithPagination;

class Formasdeentregas extends Component
{
    public $nombre, $id_formasdeentrega;

    public $modal = false;
    public $search;
    public $sort = 'id';
    public $order = 'desc';

    use WithPagination;

    protected $formasdeentrega;
    protected $rules = [
        'nombre' => 'required|max:30',
    ];

    public function render()
    {
        $this->formasdeentrega = Formadeentrega::where('nombre', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->order) 
            ->paginate(5);

        return view('livewire.backend.formasdeentrega', ['formasdeentrega' => $this->formasdeentrega]);
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
        $this->nombre = '';
    }

    public function editar($id)
    {
        $formasdeentrega = Formadeentrega::findOrFail($id);
        $this->id_formasdeentrega = $id;
        $this->nombre = $formasdeentrega->nombre;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Formadeentrega::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        $this->validate();
        Formadeentrega::updateOrCreate(
            ['id' => $this->id_formasdeentrega],
            [
                'nombre' => $this->nombre,
            ]
        );

        session()->flash(
            'message',
            $this->id_formasdeentrega ? '¡Actualización exitosa!' : '¡Alta Exitosa!'
        );

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
