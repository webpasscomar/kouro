<?php

namespace App\Http\Livewire\Backend;

use App\Models\Presentacion;
use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class Productos extends Component
{
    // Atributos
    public $nombre;
    public $desCorta;
    public $descLarga;

    public $codigo;
    public $presentacion_id;
    public $precioLista;

    public $precioOferta;
    public $ofertaDesde;
    public $ofertaHasta;

    public $peso;
    public $tamano;
    public $link;

    public $orden;
    public $unidadVenta;
    public $destacar;

    public $estado;


    // Imagenes
    protected $imagenes;
    public $imagen;
    public $talle;
    public $color;

    // Parametros generales
    public $modal = false;
    public $search;
    public $sort = 'id';
    public $order = 'desc';
    public $modal1 = false;
    public $modal2 = false;
    public $modal3 = false;

    public $producto, $id_producto;

    use WithPagination;

    protected $productos, $presentaciones;

    // Parametros para el multistep
    public $totalSteps = 4;
    public $currentStep = 1;

    protected $rules = [
        'nombre' => 'required|max:100',
        'desCorta' => 'required|max:255',
        'descLarga' => 'required|',
        'precioLista' => 'required',
    ];


    public function mount()
    {
        // Defino en 1 el paso si es multistep
        // $this->currentStep = 1;
    }

    public function render()
    {
        $this->presentaciones = Presentacion::all();
        $this->productos = Producto::where('nombre', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->order)
            ->paginate(5);
        return view('livewire.backend.productos', [
            'productos' => $this->productos,
            'presentaciones' => $this->presentaciones,
            'imagenes' => $this->imagenes
        ]);
    }

    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal($id = null)
    {

        switch ($id) {
            case 1:
                $this->modal1 = true;
                break;
            case 2:
                $this->modal2 = true;
                break;
            case 3:
                $this->modal3 = true;
                break;
            default:
            case 1:
                $this->modal = true;
                break;
        }
    }

    public function cerrarModal($id = null)
    {
        switch ($id) {
            case 1:
                $this->modal1 = false;
                break;
            case 2:
                $this->modal2 = false;
                break;
            case 3:
                $this->modal3 = false;
                $this->modal2 = true;
                break;
            default:
            case 1:
                $this->modal = false;
                break;
        }
    }

    public function limpiarCampos()
    {
        $this->reset('nombre', 'desCorta', 'descLarga', 'codigo', 'precioLista', 'ofertaDesde', 'ofertaHasta', 'precioOferta', 'peso', 'tamano', 'link', 'orden', 'unidadVenta');
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

    public function editar($id)
    {
        $producto = Producto::findOrFail($id);
        $this->id_producto = $id;
        $this->nombre = $producto->nombre;
        $this->desCorta = $producto->desCorta;
        $this->descLarga = $producto->descLarga;

        $this->codigo = $producto->codigo;
        $this->presentacion_id = $producto->presentacion_id;
        $this->precioLista = $producto->precioLista;
        $this->precioOferta = $producto->precioOferta;
        $this->ofertaDesde = $producto->ofertaDesde;
        $this->ofertaHasta = $producto->ofertaHasta;
        $this->peso = $producto->peso;
        $this->tamano = $producto->tamano;

        $this->link = $producto->link;
        $this->orden = $producto->orden;
        $this->unidadVenta = $producto->unidadVenta;
        $this->destacar = $producto->destacar;


        $this->abrirModal();
    }

    public function borrar($id)
    {
        Producto::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        $this->validate();
        Producto::updateOrCreate(
            ['id' => $this->id_producto],
            [
                'nombre' => $this->nombre,
                'desCorta' => $this->desCorta,
                'descLarga' => $this->descLarga,
                'codigo' => $this->codigo,
                'presentacion_id' => $this->presentacion_id,
                'precioLista' => $this->precioLista,
                'precioOferta' => $this->precioOferta,
                'ofertaDesde'  => $this->ofertaDesde,
                'ofertaHasta'  => $this->ofertaHasta,
                'peso' => $this->peso,
                'tamano' => $this->tamano,
                'link' => $this->link,
                'orden' => $this->orden,
                'unidadVenta' => $this->unidadVenta,
                'destacar' => $this->destacar
            ]
        );

        $this->emit('alertSave');

        $this->cerrarModal();
        $this->limpiarCampos();
    }




    public function imagenes($id)
    {
        $this->imagenes = Producto::all();
        // $this->imagenes = Producto::where('estado', 1)->paginate(5);
        // $this->id_producto = $id;
        // $this->nombre = $producto->nombre;
        // $this->desCorta = $producto->desCorta;
        // $this->descLarga = $producto->descLarga;

        $this->abrirModal(2);
    }

    public function addImagen($id)
    {
        $id_producto = $id;
        //$imagenes = Producto::all();
        // $this->id_producto = $id;
        // $this->nombre = $producto->nombre;
        // $this->desCorta = $producto->desCorta;
        // $this->descLarga = $producto->descLarga;

        $this->cerrarModal(2);
        $this->abrirModal(3);
    }







    public function validateData()
    {

        if ($this->currentStep == 1) {
            $this->validate([
                'nombre' => 'required|string',
                'desCorta' => 'required|string',
                'descLarga' => 'required|string',
                'codigo' => 'required',
                'presentacion_id' => 'required|digits:1'
            ]);
        } elseif ($this->currentStep == 2) {
            $this->validate([
                'email' => 'required|email|unique:students',
                'phone' => 'required',
                'country' => 'required',
                'city' => 'required'
            ]);
        } elseif ($this->currentStep == 3) {
            $this->validate([
                'frameworks' => 'required|array|min:2|max:3'
            ]);
        }
    }

    public function increaseStep()
    {
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep()
    {
        $this->resetErrorBag();
        $this->currentStep--;
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }

    public function register()
    {
        $this->resetErrorBag();
        if ($this->currentStep == 4) {
            $this->validate([
                'cv' => 'required|mimes:doc,docx,pdf|max:1024',
                'terms' => 'accepted'
            ]);
        }

        $cv_name = 'CV_' . $this->cv->getClientOriginalName();
        $upload_cv = $this->cv->storeAs('students_cvs', $cv_name);

        if ($upload_cv) {
            $values = array(
                "first_name" => $this->first_name,
                "last_name" => $this->last_name,
                "gender" => $this->gender,
                "email" => $this->email,
                "phone" => $this->phone,
                "country" => $this->country,
                "city" => $this->city,
                "frameworks" => json_encode($this->frameworks),
                "description" => $this->description,
                "cv" => $cv_name,
            );

            Producto::insert($values);
            //   $this->reset();
            //   $this->currentStep = 1;
            $data = ['name' => $this->first_name . ' ' . $this->last_name, 'email' => $this->email];
            return redirect()->route('productos.success', $data);
        }
    }
}
