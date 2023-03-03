<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadospedido extends Model
{
    use HasFactory;
    protected $table="estados_pedidos";



    public function pedidos()
    {
        return $this->hasToMany(Pedido::class);
    }
    

}
