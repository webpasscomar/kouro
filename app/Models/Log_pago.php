<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log_pago extends Model
{
    use HasFactory;


protected $table = 'log_pagos';

protected  $fillable = [
    'idpedido','operacion_pago','status','log','formapago_id',
];



public function formasdepago()
{
    return $this->belongsTo(Formasdepagos::class);

}


}


