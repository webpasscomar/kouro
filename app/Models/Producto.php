<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';

    protected $fillable = [
        'estado'
    ];

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'producto:categoria');
    }
}
