<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {

        $categorias = Categoria::find(1);
        $productos = $categorias->productos()->get();
        dd($categorias, $productos);
        // return view('shop.index', compact('categorias'));
    }
}
