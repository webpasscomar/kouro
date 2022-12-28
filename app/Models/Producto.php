<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';

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

    public function talles()
    {
        return $this->belongsToMany(Talle::class, 'sku');
    }

    public function colores()
    {
        return $this->belongsToMany(Color::class, 'sku');
    }
}
