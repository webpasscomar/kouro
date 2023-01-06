<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        // dd('Hola');
        // $categorias = Categoria::find(1);
        // $productos = $categorias->productos()->get();
        // dd($categorias, $productos);
        // return view('shop.index', compact('categorias'));
        return view('faqs.faqs');
    }
}
