<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;


protected $table = 'pedidos';

protected  $fillable = [
    'apellido',
    'nombre',
    'cantidadItems',
    'cliente_id',
    'correo',
    'del_calle',
    'del_nro',
    'del_piso',
    'del_dpto',
    'del_costo',
    'entrega_id',
    'estado',
    'fecha',
    'provincia_id',
    'localidad_id',
    'observaciones',
    'subTotal',
    'sucursal_id',
    'telefono',
    'total',
    'estado_id'
];


public function estado()
{
    return $this->belongsTo(Estadospedido::class);
}


public function items()
{
    return $this->belongsToMany(Pedido_item::class);
}

}
