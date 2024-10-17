<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Categoria;
use App\Models\Presentation;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('backend.products.index', compact('products'));
    }

    public function create()
    {
        $presentations = Presentation::all(); // Traemos las presentations
        $categorias = Categoria::all(); // Traer todas las categorías

        return view('backend.products.form', compact('presentations', 'categorias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'desCorta' => 'required|string|max:255',
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
        ]);

        $product = Product::create($validated);

        // Sincronizar categorías
        $product->categorias()->sync($validated['categorias']);

        toast('Producto creado con éxito', 'success');
        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        $presentations = Presentation::all(); // Traemos las presentations
        $categorias = Categoria::all(); // Traer todas las categorías

        return view('backend.products.form', compact('product', 'presentations', 'categorias'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'desCorta' => 'required|string|max:255',
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

        // Sincronizar categorías
        $product->categorias()->sync($validated['categorias']);

        toast('Producto modificado con éxito', 'success');
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        toast('Producto eliminado con éxito', 'success');
        return redirect()->route('products.index');
    }
}
