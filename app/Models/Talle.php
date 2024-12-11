<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Talle extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = 'talles';
    protected $fillable = [
        'talle',
        'estado'
    ];


    public function sku_talles()
    {
        return $this->belongsToMany(Sku::class);
    }
}
