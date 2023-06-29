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

        $fechahoy  = date('Y-m-d H:i:s');
       // $categoria = Categoria::where('slug', $slugCategoria)->firstOrFail();
        $categoria = Categoria::where('slug', $slugCategoria)->first();

        if($categoria) {
            $productos = $categoria->productos()->get();
        }else{
            $categoria = Categoria::first();
            // $categoria = new Categoria();
            // $categoria->id = 1;
            $categoria->categoria = 'Busqueda';
            $productos = Producto::where('nombre','LIKE','%' . $slugCategoria . '%')->get();
        }
        $categorias = Categoria::all();
        return view('productos.categoria', compact('productos', 'categorias', 'categoria','fechahoy'));
    }

    public function show($slugCategoria, Producto $producto)
    {
        $producto = $producto;
        $categoria = Categoria::where('slug', $slugCategoria)->firstOrFail();
        $categorias = Categoria::where('estado', 1)->get();
        return view('productos.show', compact('producto', 'categorias', 'categoria'));
    }
}
