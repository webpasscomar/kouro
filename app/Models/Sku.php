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
        return $this->belongsTo(Talle::class)->withTrashed();
    }

    public function color()
    {
        return $this->belongsTo(Color::class)->withTrashed();
    }

    public function producto()
    {
        return $this->belongsTo(Product::class)->withTrashed();
    }


    public function itemspedidos()
    {
        return $this->belongsToMany(Pedido_item::class);
    }
}

