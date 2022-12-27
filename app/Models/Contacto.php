<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mail;
use App\Mail\ContactMail;

class Contacto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'correo',
        'asunto',
        'telefono',
        'mensaje',
        'respuesta',
        'estado'
    ];

    public static function boot()
    {

        parent::boot();

        static::created(function ($item) {

            $adminEmail = "webpass@gmail.com";
            Mail::to($adminEmail)->send(new ContactMail($item));
        });
    }
}
