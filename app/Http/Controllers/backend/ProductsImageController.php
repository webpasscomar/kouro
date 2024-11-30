<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\Producto_imagen;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProductsImageController extends Controller
{

    public function index($id): View
    {
        $product = Product::findOrFail($id);
        $images = $product->imagenes;

        // modal de confirmación de eliminación de imágen
        $title = 'Está seguro?';
        $text = 'Está acción no se podrá revertir';
        confirmDelete($title, $text);

        return view(
            'backend.products.images',
            compact('product', 'images')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $product = Product::findOrFail($id);
        $colors = Color::where('estado', 1)->get();

        return view('backend.products.images-form', compact('product', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            $colors = Color::where('estado', 1)->get();
            $colorAccepted = $colors->pluck('id')->toArray();
            $productId = $request->route('product');

            $request->validate([
                'color_id' => ['required', Rule::in($colorAccepted)],
                'image' => 'required|image|mimes:png,jpg,jpeg,svg|max:1024',
            ], [
                'color_id.required' => 'Seleccione un color',
                'color_id.in' => 'Seleccione un color válido',
                'image.required' => 'La imágen es obligatoria',
                'image.image' => 'El tipo de imágen no es válido',
                'image.mimes' => 'El tipo de imágen no es válido',
                'image.max' => 'El tamaño máximo es de 1mb'
            ]);

            if ($request->hasFile('image')) {
                // nombre y extension de la imágen
                $file_name = $request->image->getClientOriginalName();
                // extensión de la imágen
                $file_extension = $request->image->extension();
                // path ruta de la imágen
                $file_path = 'storage/productos/' . $file_name;
                // guardamos la imágen en storage/productos
                $request->image->storeAs('productos', $file_name);
            }

            Producto_imagen::create([
                'file_name' => $file_name,
                'file_extension' => $file_extension,
                'file_path' => $file_path,
                'estado' => 1,
                'producto_id' => $productId,
                'color_id' => $request->input('color_id'),
            ]);

            toast('Se agregó la imágen correctamente', 'success');
            return redirect()->route('products_image.index', $productId);
        } catch (\Throwable $th) {
            // dd($th);
            toast('No se pudo agregar la imágen', 'error');
            return redirect()->route('products_image.index', $productId);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        try {
            $imageId = $request->route('product');
            $product_image = Producto_imagen::findOrFail($imageId);
            if (Storage::disk('public')->exists('productos/' . $product_image->file_name)) {
                Storage::disk('public')->delete('productos/' . $product_image->file_name);
            }
            $product_image->delete();
            toast('La imágen se eliminó correctamente', 'success');
            return back();
        } catch (\Throwable $th) {
            //dd($th);
            toast('No se pudo eliminar la imágen', 'error');
            return back();
        }
    }
}
