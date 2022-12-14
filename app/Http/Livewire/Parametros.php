<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Parametro;

class Parametros extends Component
{
    public $parametros, $parametro, $descripcion, $default, $valor, $detalle, $relacionados, $id_parametro;

    public $modal = false;

    public function render()
    {
        $this->parametros = Parametro::all();
        return view('livewire.parametros');
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

    public function borrar($id)
    {
        Parametro::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
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

        session()->flash(
            'message',
            $this->id_parametro ? '¡Actualización exitosa!' : '¡Alta Exitosa!'
        );

        $this->cerrarModal();
        $this->limpiarCampos();
    }
}
