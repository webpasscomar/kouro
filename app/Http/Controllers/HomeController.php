<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeria;
use App\Models\Producto_imagen;
use App\Models\Producto;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {

        $fotos_slider = Galeria::where('estado', '=', 1)->orderBy('orden', 'asc')->get();

        $destacados = Producto_imagen::select('productos_imagenes.producto_id', 'productos_imagenes.file_path', 'productos.nombre', 'productos.desCorta')
            ->leftJoin('productos', 'productos.id', 'productos_imagenes.producto_id')
            ->where('destacar', 1)
            ->groupBy('productos_imagenes.producto_id')
            ->get();

        foreach ($destacados as $destacado) {
            if ($destacado->file_path) {
                $destacado->file_path = basename($destacado->file_path);
            } else {
                $destacado->file_path = 'sin_imagen.jpg';
            }
        }

        $categorias = Category::where('estado', 1)
            ->where('categoriaPadre_id', 0)
            ->where('id', '>', 1)
            ->orderBy('categoria', 'asc')
            ->get();

        return view('home', ['slider' => $fotos_slider, 'destacados' => $destacados, 'categorias' => $categorias]);
    }
}
