<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Producto_imagen;

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
            $productos = $categoria->productos()->where('estado','=',1)->get();


        }else{
            $categoria = Categoria::first();
            // $categoria = new Categoria();
            // $categoria->id = 1;
            $categoria->categoria = 'Busqueda';
            $productos = Producto::where('nombre','LIKE','%' . $slugCategoria . '%')->where('estado','=',1)->get();

        }

        for ($i = 0; $i < count($productos); $i++) {
            $datos_imagenes = Producto_imagen::select(['productos_imagenes.file_path'])
            ->where('productos_imagenes.producto_id', '=',   $productos[$i]['id'])
            ->get()
            ->toArray();
            if ($datos_imagenes) {
                $productos[$i]->imagen = basename($datos_imagenes[0]['file_path']);
            }else{
                $productos[$i]->imagen = '';
            }

        }

        // $categorias = Categoria::all();
        $categorias = Categoria::where('estado','=',1)->get();
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
