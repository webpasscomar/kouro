<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoController extends Controller
{
    public function __invoke()
    {
        # code...
    }

    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function category(Categoria $categoria)
    {
        $productos = Producto::all();
        return view('productos.categoria', compact('productos'));
    }

    public function show(Producto $producto)
    {
        $categorias = Categoria::where('estado', 1)
            ->get();
        return view('productos.show', compact('producto', 'categorias'));
    }
}
