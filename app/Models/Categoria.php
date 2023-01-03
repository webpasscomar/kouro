<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Categoria extends Model
{
    use HasFactory;
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
}
