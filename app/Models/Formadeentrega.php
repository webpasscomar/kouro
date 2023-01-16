<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formadeentrega extends Model
{
    use HasFactory;
    protected $table="formasdeentregas";
    protected $fillable = [
        'nombre',
        'estado'
    ];
    
}
