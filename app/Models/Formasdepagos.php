<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formasdepagos extends Model
{
    use HasFactory;


public function logpagos()
{
    return $this->hasToMany(Log_pago::class);
}




}

