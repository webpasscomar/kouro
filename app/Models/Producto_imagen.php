<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto_imagen extends Model
{
    use HasFactory;

    protected $table = 'productos_imagenes';


    protected $fillable = [
        'producto_id',
        'color_id',
        'estado',
        'file_name',
        'file_extension',
        'file_path',
    ];


    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id' );
    }

}
