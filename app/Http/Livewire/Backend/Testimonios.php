<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Testimonio;
use Livewire\WithPagination;

class Testimonios extends Component
{

  public $testimonio, $cliente, $imagen, $id_testimonio, $estado;

  public $modal = false;
  public $search;
  public $sort = 'id';
  public $order = 'desc';

  use WithPagination;

  protected $testimonios;

  public function render()
  {
    $this->testimonios = Testimonio::where('testimonio', 'like', '%' . $this->search . '%')
      ->orderBy($this->sort, $this->order)
      ->paginate(5);

    return view('livewire.backend.testimonios', ['testimonios' => $this->testimonios]);
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
    $this->testimonio = '';
    $this->cliente = '';
    $this->id_testimonio = '';
  }

  public function editar($id)
  {
    $testimonio = Testimonio::findOrFail($id);
    $this->id_testimonio = $id;
    $this->testimonio = $testimonio->testimonio;
    $this->cliente = $testimonio->cliente;
    $this->abrirModal();
  }

  public function borrar($id)
  {
    Testimonio::find($id)->delete();
    session()->flash('message', 'Registro eliminado correctamente');
  }

  public function guardar()
  {
    Testimonio::updateOrCreate(
      ['id' => $this->id_testimonio],
      [
        'testimonio' => $this->testimonio,
        'cliente' => $this->cliente,
      ]
    );

    //session(['idCarrito' => $this->id_parametro]);

    session()->flash(
      'message',
      $this->id_testimonio ? '¡Actualización exitosa!' : '¡Alta Exitosa!'
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
