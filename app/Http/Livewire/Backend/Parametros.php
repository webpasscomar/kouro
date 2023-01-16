<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Parametro;
use Livewire\WithPagination;

class Parametros extends Component
{
    public $parametro, $descripcion, $default, $valor, $detalle, $relacionados, $id_parametro;

    public $modal = false;
    public $search;
    public $sort = 'id';
    public $order = 'desc';

    protected $parametros;

    use WithPagination;

    protected $listeners = ['delete'];

    protected $rules = [
        'detalle' => 'required|max:255',
        'descripcion' => 'required|max:255',
        'default' => 'required',
        'valor' => 'required',
        'relacionados' => 'required',
    ];

    public function render()
    {
        $this->parametros = Parametro::where('descripcion', 'like', '%' . $this->search . '%')
            ->orWhere('detalle', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->order)
            ->paginate(5);

        //$this->parametros = Parametro::all();
        return view('livewire.backend.parametros', ['parametros' => $this->parametros]);
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
        $this->descripcion = '';
        $this->default = '';
        $this->valor = '';
        $this->detalle = '';
        $this->relacionados = '';
        $this->id_parametro = '';
    }

    public function editar($id)
    {
        $parametro = Parametro::findOrFail($id);
        $this->id_parametro = $id;
        $this->descripcion = $parametro->descripcion;
        $this->default = $parametro->default;
        $this->valor = $parametro->valor;
        $this->detalle = $parametro->detalle;
        $this->relacionados = $parametro->relacionados;
        $this->abrirModal();
    }

    public function delete($id)
    {
        Parametro::find($id)->delete();
    }

    public function guardar()
    {
        $this->validate();

        Parametro::updateOrCreate(
            ['id' => $this->id_parametro],
            [
                'descripcion' => $this->descripcion,
                'default' => $this->default,
                'valor' => $this->valor,
                'detalle' => $this->detalle,
                'relacionados' => $this->relacionados
            ]
        );

        // session(['idCarrito' => $this->id_parametro]);


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
