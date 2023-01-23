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
}
