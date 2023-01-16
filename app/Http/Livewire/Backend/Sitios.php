<?php

namespace App\Http\Livewire\Backend;

use App\Models\Sitio;
use Livewire\Component;
use Livewire\WithFileUploads;

class Sitios extends Component
{

    public $Sitio, $nombre, $logo, $url, $correo, $razonSocial, $direccion, $codigoPostal, $googleMap, $googleAnalytics, $icon, $qr, $instagram, $facebook, $twitter, $linkedin, $youtube, $id_sitio, $estado;
    public $aborrar = 0;

    public $modal = false;
    public $sort = 'id';
    public $order = 'desc';

    use WithFileUploads;
    public $accion;

    protected $sitios;

    protected $rules = [
        'nombre' => 'required|max:30',
        'url' => 'required|max:255',
        'logo' => 'required|mimes:jpg,png|max:1024',
    ];

    public function render()
    {
        $this->sitios = Sitio::all();
        return view('livewire.backend.sitio', ['sitios' => $this->sitios]);
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
        $this->nombre = '';
        $this->logo = '';
        $this->url = '';
        $this->correo = '';
        $this->razonSocial = '';
    }

    public function editar($id)
    {
        $this->accion = 'editar';

        $sitio = Sitio::findOrFail($id);

        $this->id_sitio = $id;
        $this->testimonio = $testimonio->testimonio;
        $this->cliente = $testimonio->cliente;
        $this->imagen = $testimonio->imagen;
        $this->abrirModal();
    }

    public function guardar()
    {
        if (($this->accion == 'editar') and ($this->imagen !== '')) {
            dd('No tengo que validar la imagen ', $this->imagen);
        }

        $this->validate();

        $imagen_name = 'test_' . $this->imagen->getClientOriginalName();
        $upload_imagen = $this->imagen->storeAs('testimonio', $imagen_name);

        Sitio::updateOrCreate(
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
