<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock_pendiente extends Model
{
    use HasFactory;


    protected $table = 'stocks_pend';

    protected $fillable = ['producto_id', 'talle_id', 'color_id', 'fechaSolicitud', 'fechaRespuesta', 'respuesta', 'email'];

    // Relación con Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    // Relación con Talle
    public function talle()
    {
        return $this->belongsTo(Talle::class, 'talle_id');
    }

    // Relación con Color
    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
}
