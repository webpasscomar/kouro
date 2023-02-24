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
    'formaPago_id',
    'provincia_id',
    'localidad_id',
    'observaciones',
    'status_mp',
    'subTotal',
    'sucursal_id',
    'telefono',
    'total',
    'transac_mp',
    'detail_mp'
];

}