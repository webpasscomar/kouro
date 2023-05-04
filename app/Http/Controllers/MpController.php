<?php

namespace App\Http\Controllers;

use App\Http\Livewire\MercadoPago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class MpController extends Controller
{

    //este metodo habra que copiarlo al controller webhooks cuando pase a produccion
    public function pago($datos, Request $request) {
            // return $request->all();
            $payment_id = $request->get('payment_id');
            $response = Http::get(
                config('services.mercadopago.url_getpago') .  $payment_id  . "?access_token=" . config('services.mercadopago.token')
            );


            $response_jason = json_decode($response);
           // dump($response_jason->external_reference);
           // dump($response_jason->status);
           dump($response_jason);







    }
}
