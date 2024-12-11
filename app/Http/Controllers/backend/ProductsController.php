<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Presentation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index()
    {
        // modal de confirmación de eliminación de productos
        $title = 'Está seguro?';
        $text = 'Está acción no se podrá revertir';
        confirmDelete($title, $text);

        $products = Product::all();
        return view('backend.products.index', compact('products'));
    }

    public function create()
    {
        $presentations = Presentation::all(); // Traemos las presentations
        $categorias = Category::orderBy('categoria','asc')->get(); // Traer todas las categorías

        return view('backend.products.form', compact('presentations', 'categorias'));
    }

    public function store(Request $request)
    {
        // Traemos el nombre de las categorias activas para comprobar que exista al momento de seleccionar una
        $categoriasActivas = Category::where('estado', 1)->pluck('id')->toArray();

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'desCorta' => 'required|string|max:255',
            'categorias' => 'required',
            'categorias.*' => 'in:' . implode(',', $categoriasActivas),
            // 'descLarga' => 'required|string',
            'codigo' => 'nullable|string|max:255',
            'presentacion_id' => 'nullable|exists:presentaciones,id',
            'precioLista' => 'required|string|max:255',
            'precioOferta' => 'nullable|string|max:255',
            'ofertaDesde' => 'nullable|date',
            'ofertaHasta' => 'nullable|date',
            'peso' => 'nullable|string|max:255',
            'tamano' => 'nullable|string|max:255',
            'link' => 'nullable|url|max:255',
            'orden' => 'nullable|integer',
            'unidadVenta' => 'nullable|string|max:255',
            'destacar' => 'nullable|boolean',
            'estado' => 'required|boolean',
        ], [
            'nombre.required' => 'Ingrese un nombre',
            'desCorta.required' => 'Ingrese una descripción corta',
            'descLarga.required' => 'Ingrese una descripción larga',
            'precioLista.required' => 'Ingrese un precio de lista',
            'estado.required' => 'Seleccione un estado',
            'categorias.required' => 'Seleccione una categoria',
            'categorias.*.in' => 'Seleccione una categoria correcta'
        ]);

        try {
            $product = Product::create($validated);

            // Sincronizar categorías si se selecciona una
            if (isset($validated['categorias'])) {
                $product->categorias()->sync($validated['categorias']);
            }

            toast('Producto creado con éxito', 'success');
            return redirect()->route('products.index');
        } catch (\Throwable $th) {
            // dd($nombresCategoriasActivas);
            // dd($th);
            toast('No se pudo crear el producto', 'error');
            return redirect()->route('products.index');
        }
    }

    public function edit(Product $product)
    {
        $presentations = Presentation::all(); // Traemos las presentations
        $categorias = Category::all(); // Traer todas las categorías

        return view('backend.products.form', compact('product', 'presentations', 'categorias'));
    }

    public function update(Request $request, Product $product)
    {
        // Traemos el nombre de las categorias activas para comprobar que exista al momento de seleccionar una
        $categoriasActivas = Category::where('estado', 1)->pluck('id')->toArray();

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'desCorta' => 'required|string|max:255',
            'categorias' => 'nullable',
            'categorias.*' => 'in:' . implode(',', $categoriasActivas),
            // 'descLarga' => 'required|string',
            'codigo' => 'nullable|string|max:255',
            'presentacion_id' => 'nullable|exists:presentaciones,id',
            'precioLista' => 'required|string|max:255',
            'precioOferta' => 'nullable|string|max:255',
            'ofertaDesde' => 'nullable|date',
            'ofertaHasta' => 'nullable|date',
            'peso' => 'nullable|string|max:255',
            'tamano' => 'nullable|string|max:255',
            'link' => 'nullable|url|max:255',
            'orden' => 'nullable|integer',
            'unidadVenta' => 'nullable|string|max:255',
            'destacar' => 'nullable|boolean',
            'estado' => 'required|boolean',
        ]);

        $product->update($validated);

        // Sincronizar categorías si se selecciona una
        if (isset($validated['categorias'])) {
            $product->categorias()->sync($validated['categorias']);
        }

        toast('Producto modificado con éxito', 'success');
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product = Product::with('imagenes')->findOrFail($product->id);
        $images = $product->imagenes;

        // Al eliminar el producto, eliminar las imágenes correspondientes al mismo
        foreach ($images as $img) {
            if (Storage::disk('public')->exists('productos/' . $img->file_name)) {
                Storage::disk('public')->delete('productos/' . $img->file_name);
            }
        }

        $product->delete();

        toast('Producto eliminado con éxito', 'success');
        return redirect()->route('products.index');
    }
}
