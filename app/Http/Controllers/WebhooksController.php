<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


use App\Models\Log_pago;
use App\Models\Pedido_item;
use App\Models\Sku;
use App\Models\Movimiento;



class WebhooksController extends Controller
{
    public function __invoke(Request $request){

        //simulacion de recepcion de mp poner la ruta en post---------------------------------
        //  $data = [
        //      'id' => 12345,
        //      'live_mode' =>  true,
        //      'type' => 'payment',
        //      'date_created' =>  '2015-03-25T10:04:58.396-04:00',
        //      'user_id' => 44444,
        //      'api_version' =>  'v1',
        //      'action' => 'payment.created',
        //      'data' => ['id' => '1314820621',],
        //      ];
        //  $jsonData = json_encode($data);
        //  $payment_id = json_decode($jsonData)->data->id;
        //----------------------------------------------------------------
        $payment_id = $request->get('data')['id'];
        $response = Http::get(
              config('services.mercadopago.url_getpago') .  $payment_id  . "?access_token=" . config('services.mercadopago.token')
         );

        $response_json = json_decode($response);
        $response_idpedido = $response_json->external_reference;

        //return $response_json;

        $procesado = null;
        $procesado = Log_pago::where('idpedido', $response_idpedido)
                              ->where('status', 'approved')
                    ->value('id');
           //actualiza cabecera
           Log_pago::updateOrCreate(
            ['idpedido' =>  $response_json->external_reference],
              [
                  'idpedido'        => $response_json->external_reference,
                  'operacion_pago'  => $payment_id,
                  'status'          => $response_json->status,
                  'log'             => $response,
                  'formapago_id'    => 2,
              ]);


        //actualizamos stock aca
        //la baja de stock la hacemos cuando paga el pedido y esta aprobado
        //y el parametro de  maneja stock esta prendido

        $stock_si = parametro(10);
        if ($response_json->status === 'approved' && $stock_si ==='S') {
               if ($procesado == null ) {  //nunca fue procesado
                    $pedidos_items =  Pedido_item::where('pedido_id', '=', $response_idpedido)->get();
                    foreach ($pedidos_items as $item) {
                     ////obtenemos la cantidad original de stock
                     $canti_ori = Sku::where('id', $item->sku_id)->value('stock');
                     if ($canti_ori === null) {
                         $canti_ori = 0;
                     }
                    //actualizo stock
                    $cantidad = $canti_ori - $item->cantidad;
                    Sku::updateOrCreate(
                         [
                             'id' => $item->sku_id,
                         ],
                         [
                             'stock' => $cantidad,
                         ]
                    );
                     //// grabamos en historia en movimiento
                     Movimiento::Create([
                         'tipoMovimiento_id' => 2,
                         'sku_id' => $item->sku_id,
                         'cantidad' => $item->cantidad,
                         'pedido_id' => $item->pedido_id,
                         'estado' => 0,   //no se que es
                         'user_id' => 0,
                     ]);

                     return 'procesado';
             }
             } else {
                return 'procesado con anterioridad';
        }

        //no tiene emit porque no es un controlador livewire
        //$this->emit('mensajePositivo', ['mensaje' => 'El pago se realizo con exito']);
        //return redirect()->to('/shop');

 }

}

}
