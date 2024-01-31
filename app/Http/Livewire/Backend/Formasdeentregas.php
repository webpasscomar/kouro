<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Formadeentrega;
use Livewire\WithPagination;

class Formasdeentregas extends Component
{
    public $nombre, $id_formasdeentrega, $pidedirec;
    public $costo = 0;
    public $cobra = 1;

    protected $listeners = ['delete'];

    public $modal = false;
    public $search;
    public $sort = 'id';
    public $order = 'desc';

    use WithPagination;

    protected $formasdeentrega;
    protected $rules = [
        'nombre' => 'required|max:30',
        'costo' => 'numeric',
    ];


    protected function messages()
    {
        return [
            'nombre.required' => 'Debe ingresar el nombre.',
            'nombre.max' => 'Solo puede ingresar 30 caracteres.',
            'costo.numeric' => 'Debe ingresar un valor numerico.',
        ];
    }

    public function render()
    {
        $this->formasdeentrega = Formadeentrega::where('nombre', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->order)
            ->paginate(10);

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
        $this->id_formasdeentrega = 0;
        $this->pidedirec = 0;
        $this->nombre = '';
        $this->costo = 0;
        $this->cobra = 1;
    }

    public function editar($id)
    {
        $formasdeentrega = Formadeentrega::findOrFail($id);
        $this->id_formasdeentrega = $id;
        $this->nombre = $formasdeentrega->nombre;
        $this->costo = $formasdeentrega->costo;
        $this->pidedirec = $formasdeentrega->pidedirec;
        // $this->cobra = $formasdeentrega->cobra;
        $this->abrirModal();
    }

    public function delete($id)
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
                'pidedirec' => $this->pidedirec,
                'costo' => $this->costo,
                //  'cobra' => $this->cobra,
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
