<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipoMovimiento_id',
        'sku_id',
        'cantidad',
        'pedido_id',
        'estado',
        'user_id' ,
    ];

}
