<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'desCorta',
        'descLarga',
        'codigo',
        'presentacion_id',
        'precioLista',
        'precioOferta',
        'ofertaDesde',
        'ofertaHasta',
        'peso',
        'tamano',
        'link',
        'orden',
        'unidadVenta',
        'destacar',
        'estado'
    ];

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'producto_categoria');
    }
}
