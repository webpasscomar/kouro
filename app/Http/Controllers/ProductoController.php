<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Category;
use App\Models\Producto_imagen;

class ProductoController extends Controller
{

    public function index()
    {
        $categorias = Category::obtenerArbolCategoriasActivas();

        return view('productos.index', compact('categorias'));
    }


    public function destacados()
    {

        // $productos = Producto::with(['categorias']) // Usamos Eager Loading
        //     ->where('estado', 1)
        //     ->where('destacar', 1)
        //     ->get();

        // $productos = Producto::with(['categorias']) // Eager loading de la relación 'categorias'
        //     ->where('estado', 1)                  // Filtra productos activos
        //     ->where('destacar', 1)                // Filtra productos destacados
        //     ->whereHas('skus', function ($query) {
        //         $query->where('stock', '>', 0); // Verifica que haya stock en la tabla SKU
        //     })
        //     ->get();

        $productos = Producto::with(['categorias']) // Eager loading de la relación 'categorias'
            ->where('estado', 1)                  // Filtra productos activos
            ->where('destacar', 1)                // Filtra productos destacados
            ->whereHas('skus')                    // Verifica que existan registros en la tabla SKU
            ->get();

        for ($i = 0; $i < count($productos); $i++) {
            $datos_imagenes = Producto_imagen::select(['productos_imagenes.file_path'])
                ->where('productos_imagenes.producto_id', '=',   $productos[$i]['id'])
                ->get()
                ->toArray();
            if ($datos_imagenes) {
                $productos[$i]->imagen = basename($datos_imagenes[0]['file_path']);
            } else {
                $productos[$i]->imagen = '';
            }
        }

        $categorias = Category::obtenerArbolCategoriasActivas();

        // $fechahoy  = date('Y-m-d H:i:s');
        $fechahoy  = date('Y-m-d');
        // $fechahoy  = Carbon::now()->toDateString();

        $categoria = new Category();
        $categoria->categoria = 'Destacados';
        $categoria->slug = 'destacados';
        $categoria->categoriaPadre_id = 0;
        $hijas = $categoria->hijas;
        // dd($productos);
        return view('productos.categoria', compact('productos', 'categorias', 'hijas', 'categoria', 'fechahoy'));
    }


    public function categoria($slugCategoria)
    {

        $fechahoy  = date('Y-m-d H:i:s');
        $categoria = Category::where('slug', $slugCategoria)->first();
        $hijas = $categoria->hijas;

        if ($categoria) {
            $productos = $categoria->productos()
                ->where('estado', '=', 1)
                ->whereHas('skus')
                ->get();
        } else {
            $categoria = Category::first();
            $categoria->categoria = 'Busqueda';
            $productos = Producto::where('nombre', 'LIKE', '%' . $slugCategoria . '%')->where('estado', '=', 1)->get();
        }

        for ($i = 0; $i < count($productos); $i++) {
            $datos_imagenes = Producto_imagen::select(['productos_imagenes.file_path'])
                ->where('productos_imagenes.producto_id', '=',   $productos[$i]['id'])
                ->get()
                ->toArray();
            if ($datos_imagenes) {
                $productos[$i]->imagen = basename($datos_imagenes[0]['file_path']);
            } else {
                $productos[$i]->imagen = '';
            }
        }

        $categorias = Category::obtenerArbolCategoriasActivas();
        return view('productos.categoria', compact('productos', 'categorias', 'hijas', 'categoria', 'fechahoy'));
    }


    public function show($slugCategoria, Producto $producto)
    {
        $producto = $producto;
        $categoria = Category::where('slug', $slugCategoria)->firstOrFail();

        $categorias = Category::obtenerArbolCategoriasActivas();
        return view('productos.show', compact('producto', 'categorias', 'categoria'));
    }
}
