<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Testimonio;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Testimonios extends Component
{

  public $testimonio, $cliente, $imagen, $id_testimonio, $estado;
  public $aborrar = 0;

  public $modal = false;
  public $search;
  public $sort = 'id';
  public $order = 'desc';

  use WithPagination;
  use WithFileUploads;
  public $accion;

  protected $testimonios;

  protected $listeners = ['deleteTestimonio', 'render'];

  protected $rules = [
    'cliente' => 'required|max:30',
    'testimonio' => 'required|max:255',
    'imagen' => 'required|mimes:jpg,png|max:1024',
  ];

  public function render()
  {

    $this->testimonios = Testimonio::where('testimonio', 'like', '%' . $this->search . '%')
      ->orderBy($this->sort, $this->order)
      ->paginate(5);

    return view('livewire.backend.testimonios', ['testimonios' => $this->testimonios]);
  }

  public function crear()
  {
    $this->accion = 'crear';
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
    $this->imagen = '';
    $this->estado = '';
    $this->id_testimonio = '';
  }

  public function editar($id)
  {
    $this->accion = 'editar';

    $testimonio = Testimonio::findOrFail($id);

    $this->id_testimonio = $id;
    $this->testimonio = $testimonio->testimonio;
    $this->cliente = $testimonio->cliente;
    $this->imagen = $testimonio->imagen;
    $this->abrirModal();
  }

  public function deleteTestimonio($id)
  {
    Testimonio::find($id)->delete();
  }

  public function guardar()
  {
    $this->validate();

    $imagen_name = 'Cliente_' . $this->imagen->getClientOriginalName();
    $upload_imagen = $this->imagen->storeAs('testimonio', $imagen_name);

    Testimonio::updateOrCreate(
      ['id' => $this->id_testimonio],
      [
        'testimonio' => $this->testimonio,
        'cliente' => $this->cliente,
        'imagen' => $imagen_name,
        'estado' => 1
      ]
    );

    //session(['idCarrito' => $this->id_parametro]);

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
