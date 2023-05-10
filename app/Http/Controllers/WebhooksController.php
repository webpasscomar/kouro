<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log_pago;
use Illuminate\Support\Facades\Http;



class WebhooksController extends Controller
{
    public function __invoke(Request $request){

        //simulacion de recepcion de mp poner la ruta en post---------------------------------
        // $data = [
        //     'id' => 12345,
        //     'live_mode' =>  true,
        //     'type' => 'payment',
        //     'date_created' =>  '2015-03-25T10:04:58.396-04:00',
        //     'user_id' => 44444,
        //     'api_version' =>  'v1',
        //     'action' => 'payment.created',
        //     'data' => ['id' => '1312869096',],
        //     ];
        // $jsonData = json_encode($data);
        // $payment_id = json_decode($jsonData)->data->id;
        //----------------------------------------------------------------

        $payment_id = json_decode($request)->data->id;
        $response = Http::get(
              config('services.mercadopago.url_getpago') .  $payment_id  . "?access_token=" . config('services.mercadopago.token')
         );


        $response_json = json_decode($response);

        //actualiza cabecera
           Log_pago::updateOrCreate(
            ['idpedido' =>  $response_json->external_reference],
              [
                  'idpedido'        => $response_json->external_reference,
                  'operacion_pago'  => $payment_id,
                  'status'          => $response_json->status,
                  'log'             => $response,
              ]);
              //no tiene emit porque no es un controlador livewire
              //$this->emit('mensajePositivo', ['mensaje' => 'El pago se realizo con exito']);
        //      return redirect()->to('/shop');

 }



}
