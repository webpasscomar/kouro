<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use HasFactory;
    use softDeletes;

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
        return $this->belongsToMany(Producto::class, 'producto_categoria','categoria_id' ,'producto_id');
    }

    public function hijas()
    {
        return $this->hasMany(Category::class, 'categoriaPadre_id')
            ->where('estado', 1)  // Solo categorías activas
            ->with('hijas');       // Recursivamente traer las hijas activas
    }

    public static function obtenerArbolCategoriasActivas()
    {
        return Category::where('estado', 1)  // Solo categorías activas
            ->where('categoriaPadre_id', 0) // Categorías raíz
            ->with('hijas')  // Recursivamente traer las hijas activas
            ->orderBy('categoria')
            ->get();
    }
}
