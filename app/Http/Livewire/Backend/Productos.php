<?php

namespace App\Http\Livewire\Backend;

use App\Models\Presentacion;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Producto_imagen;
use App\Models\Producto_categoria;

use App\Models\Color;
use Livewire\Component;
use Livewire\WithPagination;

use Livewire\WithFileUploads;




class Productos extends Component
{

    use WithFileUploads;
    use WithPagination;

    // Atributos
    public $nombre;
    public $desCorta='';
    public $descLarga='';

    public $codigo;
    public $presentacion_id;
    public $precioLista;

    public $precioOferta;
    public $ofertaDesde;
    public $ofertaHasta;

    public $peso;
    public $tamano;
    public $link;

    public $orden=1;
    public $unidadVenta;
    public $destacar=0;

    public $estado;


    // Imagenes
    protected $imagenes;
    public $imagen;
    public $talle;
    public $color;

    // Parametros generales
    public $search;
    public $sort = 'id';
    public $order = 'desc';
    public $modal = false;
    public $modal1 = false;
    public $modal2 = false;
    public $modal3 = false;
    public $modal4 = false;
    public $modal5 = false;

    public $producto, $producto_id;

    ///ruben
    public $colores;
    public $color_id;
    public $producto_imagen;
    public $producto_nombre;
    public $productos_categorias;
    public $categorias;
    public $categoria_id;
    public $id_producto;
    public $presentaciones;










    protected $productos;

    // Parametros para el multistep
    public $totalSteps = 4;
    public $currentStep = 1;



    protected function rules()
    {
        if ($this->modal === true) {
            return [
                'nombre' => 'required|max:100',
                'desCorta' => 'required|max:255',
                // 'descLarga' => 'required|',
                'precioLista' => 'required',
                'unidadVenta' => 'required',
                'orden' => 'required',
            ];
        }
        if ($this->modal3 === true) {
            return [
                'imagen' => ['required', 'mimes:png,jpg,jpeg'],
                'color_id' => 'required|not_in:0',
            ];
        }

        if ($this->modal5 === true) {
            return [
                'categoria_id' => 'required|not_in:0',
            ];
        }
    }







    public function mount()
    {

        $this->colores = Color::where('estado', 1)->orderBy('color')->get();
        $this->categorias = Categoria::where('estado', 1)->orderBy('categoria')->get();
        $this->presentaciones = Presentacion::where('estado', 1)->orderBy('presentacion')->get();
    }

    public function render()
    {
        $this->productos = Producto::where('nombre', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->order)
            ->paginate(5);



        return view('livewire.backend.productos', [
            'productos' => $this->productos,
            'presentaciones' => $this->presentaciones,
            'imagenes' => $this->imagenes,
            'colores' => $this->colores,
            'productos_categorias' => $this->productos_categorias,
            'categorias' => $this->categorias,
        ]);
    }

    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal(1);
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

        $this->abrirModal(1);
    }


    public function guardar()
    {
        $this->validate();

        if ($this->descLarga == null) {
            $this->descLarga='';
        }

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

        $this->limpiarCampos();
        $this->cerrarModal(1);
    }



    public function abrirModal($id = null)
    {

        switch ($id) {
            case 1:
                $this->modal = true;   //producto
                break;
            case 2:
                $this->modal2 = true; //imagenes
                break;
            case 3:
                $this->modal3 = true;  //alta de imagenes
                break;
            case 4:
                $this->modal4 = true;  //categorias
                break;
            case 5:
                $this->modal5 = true;  //categorias
                break;
            default:
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

    public function imagenes($id)
    {
        $this->producto_id = $id;
        //$this->imagenes = Producto_imagen::where('producto_id',$id)->get();

        $this->producto_nombre = Producto::where('id', $id)->value('nombre');

        $this->imagenes = Producto_imagen::select([
            'productos_imagenes.id',
            'productos_imagenes.file_name',
            'productos_imagenes.file_extension',
            'productos_imagenes.file_path',
            'productos_imagenes.estado',
            'colores.color',
            'productos.nombre'
        ])
            ->join('colores', 'productos_imagenes.color_id', '=', 'colores.id')
            ->join('productos', 'productos_imagenes.producto_id', '=', 'productos.id')
            ->where('productos_imagenes.producto_id', '=', $id)
            ->get();

        $this->abrirModal(2);
    }


    public function categorias($id)
    {
        $this->producto_id = $id;

        $this->producto_nombre = Producto::where('id', $id)->value('nombre');

        $this->productos_categorias = Producto_categoria::select([
            'producto_categoria.id',
            'producto_categoria.producto_id',
            'producto_categoria.categoria_id',
            'categorias.categoria',
            'productos.nombre'
        ])
            ->join('categorias', 'producto_categoria.categoria_id', '=', 'categorias.id')
            ->join('productos', 'producto_categoria.producto_id', '=', 'productos.id')
            ->where('producto_categoria.producto_id', '=', $id)
            ->get();

        $this->abrirModal(4);
    }




    ///abre el formulario de alta o edicion de categorias
    public function addCategoria()
    {

        $this->cerrarModal(4);
        $this->abrirModal(5);
    }

    //sale sin grabar categoria
    public function notsaveCategoria()
    {
        $this->categorias($this->producto_id);
        $this->cerrarModal(5);
        $this->abrirModal(4);
    }

    //sale y graba categoria
    public function saveCategoria()
    {


        $this->validate();


        Producto_categoria::updateOrCreate(
            ['producto_id' => $this->producto_id, 'categoria_id' => $this->categoria_id],
            [
                'producto_id' => $this->producto_id,
                'categoria_id' => $this->categoria_id
            ]
        );

        $this->cerrarModal(5);
        $this->abrirModal(4);
        $this->categoria_id = 0;
        $this->categorias($this->producto_id);
    }

    //elimina una categoria asignada al producto
    public function  deleteCategoria($id)
    {
        Producto_categoria::find($id)->delete();
        $this->emit('mensajePositivo', ['mensaje' => 'Categoria eliminada correctamente']);
        $this->categorias($this->producto_id);
    }





    ///abre el formulario de alta o edicion de imagenes
    public function addImagen()
    {

        $this->cerrarModal(2);
        $this->abrirModal(3);
    }


    public function  deleteImagen($id)
    {
        Producto_imagen::find($id)->delete();
        $this->emit('mensajePositivo', ['mensaje' => 'Imagen eliminada correctamente']);
        $this->imagenes($this->producto_id);
    }


    //sale sin grabar imagen
    public function notsaveImagen()
    {
        $this->imagenes($this->producto_id);
        $this->cerrarModal(3);
        $this->abrirModal(2);
    }

    //sale y graba imagen
    public function saveImagen()
    {


        $this->validate();

        $filetosave = new Producto_imagen();
        $filetosave->producto_id  = $this->producto_id;
        $filetosave->color_id  = $this->color_id;
        $filetosave->estado    = 1;
        $filetosave->file_name = $this->imagen->getClientOriginalName();
        $filetosave->file_extension = $this->imagen->extension();
        $filetosave->file_path = 'storage/' . $this->imagen->store('productos', 'public');
        $filetosave->save();
        $this->cerrarModal(3);
        $this->abrirModal(2);
        $this->imagen = null;
        $this->color_id = 0;
        $this->imagenes($this->producto_id);
    }


    public function cerrarModal($id = null)
    {
        switch ($id) {
            case 1:
                $this->modal = false;
                break;
            case 2:
                $this->modal2 = false;
                break;
            case 3:
                $this->modal3 = false;
                break;
            case 4:
                $this->modal4 = false;
                break;
            case 5:
                $this->modal5 = false;
                break;
            default:
        }
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

    public function borrar($id)
    {
        Producto::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }
}
