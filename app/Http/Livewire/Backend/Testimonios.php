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
  public $cambioImg = false;


  use WithPagination;
  use WithFileUploads;

  public $accion;

  protected $testimonios;

  protected $listeners = ['delete'];

  protected function rules() {
    if (($this->cambioImg===true && $this->accion==='editar') ||
         $this->accion==='crear'){
        return [
            'cliente' => 'required|max:30',
            'testimonio' => 'required|max:255',
            'imagen' => 'required|mimes:jpg,png|max:1024',
        ];
    }else{
        return [
            'cliente' => 'required|max:30',
            'testimonio' => 'required|max:255',
            //'imagen' => 'required|mimes:jpg,png|max:1024',
        ];

    }
  }




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
    $this->cambioImg=false;
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

  public function delete($id)
  {
    Testimonio::find($id)->delete();
  }


  public function cambioImagen() {
    $this->cambioImg=true;

  }



  public function guardar()
  {


    $this->validate();

     if ($this->cambioImg) {
            ////
            //// borrar imagen anterior storage
            ////
            $imagen_name =  $this->imagen->getClientOriginalName();
            $upload_imagen = $this->imagen->storeAs('testimonio', $imagen_name);
            $this->cambioImg=false;
     }else{
        $imagen_name = $this->imagen;
     }

            Testimonio::updateOrCreate(
                ['id' => $this->id_testimonio],
                [
                'testimonio' => $this->testimonio,
                'cliente' => $this->cliente,
                'imagen' => $imagen_name,
                'estado' => 1
                ]
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
