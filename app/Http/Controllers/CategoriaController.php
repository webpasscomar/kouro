<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {

        $categorias = Categoria::all();
        // return $categorias;
        return view('shop.index', compact('categorias'));
    }
}