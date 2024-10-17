<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
// use App\Models\Producto;
use App\Models\Producto_imagen;
use Livewire\WithFileUploads;

class Productosimagenes extends Component
{
    public $productId;
    public $imagenes;
    public $imagen;
    public $color_id;

    use WithFileUploads;


    public function mount($productId)
    {
        $this->productId = $productId;
        $this->loadImages(); // Cargar las imágenes al iniciar el componente
    }


    public function loadImages()
    {
        // Cargar las imágenes asociadas al producto
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
            ->where('productos_imagenes.producto_id', '=', $this->productId)
            ->get();
    }

    public function render()
    {
        return view('livewire.backend.productos-imagenes', [
            'images' => $this->imagenes,
        ]);
    }

    //sale y graba imagen
    public function saveImagen()
    {
        $this->validate();

        $filetosave = new Producto_imagen();
        $filetosave->producto_id = $this->productId;
        $filetosave->color_id = $this->color_id;
        $filetosave->estado = 1;
        $filetosave->file_name = $this->imagen->getClientOriginalName();
        $filetosave->file_extension = $this->imagen->extension();
        $filetosave->file_path = 'storage/' . $this->imagen->store('productos', 'public');
        $filetosave->save();
        $this->imagen = null;
        $this->color_id = 0;
        // $this->imagenes($this->productId);

        // Limpiar el formulario
        $this->imagen = null;
        $this->color_id = null; // O 0, dependiendo de tu lógica

        // Re-cargar las imágenes después de guardar
        $this->loadImages();
    }








    protected function rules()
    {

        return [
            'imagen' => ['required', 'mimes:png,jpg,jpeg'],
            'color_id' => 'required|not_in:0',
        ];
    }



    public function deleteImagen($id)
    {
        // dd('Imagen: ' . $id);
        Producto_imagen::find($id)->delete();
        // $this->emit('mensajePositivo', ['mensaje' => 'Imagen eliminada correctamente']);
        // $this->imagenes($this->productId);
        $this->loadImages();
    }



}
