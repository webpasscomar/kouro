<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock_pendiente extends Model
{
    use HasFactory;


    protected $table = 'stocks_pend';

    protected $fillable = ['sku_id','fechaSolicitud','fechaRespuesta','respuesta','cantidad','email' ];



}
