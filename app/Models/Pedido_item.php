<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido_item extends Model
{
    use HasFactory;


protected $table = 'pedido_item';

protected  $fillable = [
    'cantidad',
    'pedido_id',
    'precioItem',
    'precioUnitario',    
    'sku_id',
    'vacio',
];


public function pedido()
{
    return $this->belongsTo(Pedido::class,'id');
}



public function sku()
{
    return $this->belongsTo(Sku::class);
}

public function producto()
{
    return $this->belongsTo(Producto::class);
}



}