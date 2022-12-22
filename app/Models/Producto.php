<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoriaPadre_id',
        'idioma_id',
        'categoria',
        'descripcion',
        'slug',
        'imagen',
        'menu',
        'orden',
        'modulo_id',
        'estado'
    ];
}
