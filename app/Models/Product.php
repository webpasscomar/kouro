<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use softDeletes;
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
        return $this->belongsToMany(Category::class, 'producto_categoria', 'producto_id', 'categoria_id');
    }


    public function sku_productos()
    {
        return $this->belongsToMany(Sku::class);
    }


    public function imagenes()
    {
        return $this->hasMany(Producto_imagen::class, 'producto_id');
    }
}
