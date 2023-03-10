<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    use HasFactory;

    protected $table = 'sku';

    protected $fillable = [
        'producto_id','talle_id','color_id','stock','estado'
    ];


    public function talle()
    {
        return $this->belongsTo(Talle::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }


    public function itemspedidos()
    {
        return $this->belongsToMany(Pedido_item::class);
    }


}

