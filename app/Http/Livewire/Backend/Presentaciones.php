<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Presentacion;
use Livewire\WithPagination;

class Presentaciones extends Component
{
    public $presentacion, $id_presentacion, $sigla;

    public $modal = false;
    public $search;
    public $sort = 'id';
    public $order = 'desc';

    use WithPagination;

    protected $presentaciones;

    public function render()
    {
        $this->presentaciones = Presentacion::where('presentacion', 'like', '%' . $this->search . '%')
            ->orWhere('sigla', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->order)
            ->paginate(5);

        return view('livewire.backend.presentaciones', ['presentaciones' => $this->presentaciones]);
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
        $this->sigla = '';
        $this->presentacion = '';
    }

    public function editar($id)
    {
        $presentacion = Presentacion::findOrFail($id);
        $this->id_presentacion = $id;
        $this->sigla = $presentacion->sigla;
        $this->presentacion = $presentacion->presentacion;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Presentacion::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        Presentacion::updateOrCreate(
            ['id' => $this->id_presentacion],
            [
                'presentacion' => $this->presentacion,
                'sigla' => $this->sigla,
            ]
        );

        //session(['idCarrito' => $this->id_parametro]);

        session()->flash(
            'message',
            $this->id_presentacion ? '¡Actualización exitosa!' : '¡Alta Exitosa!'
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
