<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto_categoria extends Model
{
    use HasFactory;

    protected $table = 'producto_categoria';


    protected $fillable = [
        'producto_id',
        'categoria_id',
    ];
}
