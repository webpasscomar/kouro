<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = 'colores';

    protected $fillable = [
        'color',
        'pcolor',
        'imagen',
        'estado'
    ];


    public function sku_colores()
    {
        return $this->belongsToMany(Sku::class);
    }


    public function imagenes()
    {
        return $this->hasMany(Producto_imagen::class, 'color_id');
    }
}
