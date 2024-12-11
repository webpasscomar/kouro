<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = 'talles';

    protected $fillable = [
        'talle',
        'estado'
    ];
}
