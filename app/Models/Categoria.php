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
        return $this->hasMany(Categoria::class, 'categoriaPadre_id')
            ->where('estado', 1)  // Solo categorías activas
            ->with('hijas');       // Recursivamente traer las hijas activas
    }

    public static function obtenerArbolCategoriasActivas()
    {
        return Categoria::where('estado', 1)  // Solo categorías activas
            ->where('categoriaPadre_id', 0) // Categorías raíz
            ->with('hijas')  // Recursivamente traer las hijas activas
            ->orderBy('categoria')
            ->get();
    }
}
