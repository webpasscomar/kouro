<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoController extends Controller
{


    public function index()
    {
        $categorias = Categoria::all();
        return view('productos.index', compact('categorias'));
    }

    public function categoria(Categoria $categoria)
    {
        $productos = $categoria->productos()->get();
        return view('productos.categoria', compact('productos'));
    }

    public function show(Producto $producto)
    {
        $categorias = Categoria::where('estado', 1)->get();
        return view('productos.show', compact('producto', 'categorias'));
    }
}
