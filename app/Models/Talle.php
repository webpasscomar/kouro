<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talle extends Model
{
    use HasFactory;

    protected $fillable = [
        'talle',
        'estado'
    ];


    public function sku_talles()
    {
        return $this->belongsToMany(Sku::class);
    }
}
