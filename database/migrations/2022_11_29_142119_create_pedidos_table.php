<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();

            $table->timestamp('fecha');

            $table->integer('sucursal_id');
            $table->integer('cliente_id');

            $table->string('apellido');
            $table->string('nombre');
            $table->string('correo');

            $table->string('telefono');

            $table->string('del_calle');
            $table->integer('del_nro');
            $table->string('del_piso');
            $table->string('del_dpto');
            $table->integer('localidad_id');
            $table->integer('provincia_id');

            $table->string('observaciones');

            $table->integer('cantidadItems');
            $table->float('subTotal');
            $table->float('total');
            $table->float('del_costo');

            $table->integer('formaPago_id');
            $table->integer('entrega_id');

            $table->tinyInteger('estado_id');


            $table->string('status_mp');
            $table->string('detail_mp');
            $table->integer('transac_mp');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
