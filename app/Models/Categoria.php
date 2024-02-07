<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Categoria extends Model
{
    use HasFactory;

    /**
     * @var int|mixed
     */
    // public $categoriaPadre_id;
    /**
     * @var mixed|string
     */
    // public $categoria;
    protected $table = 'categorias';

    protected $fillable = [
        'categoriaPadre_id',
        'categoria',
        'slug',
        'descripcion',
        'imagen',
        'menu',
        'orden',
        'estado'
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'producto_categoria');
    }

    public function hijas()
    {
        return $this->hasMany(Categoria::class, 'categoriaPadre_id')->with('hijas');
    }

    public static function obtenerArbolCategoriasActivas()
    {
        return Categoria::where('estado', true)
            ->where('categoriaPadre_id', 0) // Categorías de nivel superior (raíz)
            ->with('hijas')
            ->orderBy('categoria')
            ->get();
    }
}
