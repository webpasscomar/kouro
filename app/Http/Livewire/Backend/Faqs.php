<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Faq;
use Livewire\WithPagination;

class Faqs extends Component
{

    public $pregunta, $respuesta, $id_faq, $estado;

    public $modal = false;
    public $search;
    public $sort = 'id';
    public $order = 'desc';

    use WithPagination;

    protected $faqs;

    public function render()
    {
        $this->faqs = Faq::where('pregunta', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->order)
            ->paginate(5);

        return view('livewire.backend.faqs', ['faqs' => $this->faqs]);
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
        $this->pregunta = '';
        $this->respuesta = '';
        $this->id_faq = '';
    }

    public function editar($id)
    {
        $faq = Faq::findOrFail($id);
        $this->id_faq = $id;
        $this->pregunta = $faq->pregunta;
        $this->respuesta = $faq->respuesta;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Faq::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        Faq::updateOrCreate(
            ['id' => $this->id_faq],
            [
                'pregunta' => $this->pregunta,
                'respuesta' => $this->respuesta,
            ]
        );

        //session(['idCarrito' => $this->id_parametro]);

        session()->flash(
            'message',
            $this->id_faq ? '¡Actualización exitosa!' : '¡Alta Exitosa!'
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
