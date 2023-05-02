<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoController extends Controller
{

    public function index()
    {
        $categorias = Categoria::where('estado', 1)
            ->where('id', '>', 1)
            ->orderBy('categoria', 'asc')
            ->get();

        return view('productos.index', compact('categorias'));
    }

    public function categoria($slugCategoria)
    {
        $categoria = Categoria::where('slug', $slugCategoria)->firstOrFail();
        $productos = $categoria->productos()->get();
        $categorias = Categoria::all();
        return view('productos.categoria', compact('productos', 'categorias', 'categoria'));
    }

    public function show($slugCategoria, Producto $producto)
    {
        $producto = $producto;
        $categoria = Categoria::where('slug', $slugCategoria)->firstOrFail();
        $categorias = Categoria::where('estado', 1)->get();
        return view('productos.show', compact('producto', 'categorias', 'categoria'));
    }
}
