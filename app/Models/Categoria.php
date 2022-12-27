<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categorias';

    protected $fillable = [
        'nombre',
        'slug',
        'desCorta',
        'descLarga',
        'codigo',
        'presentacion_id',
        'impuesto_id',
        'peso',
        'tamano',
        'estado'
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'producto_categoria');
    }
}
