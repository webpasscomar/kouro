<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_pagos', function (Blueprint $table) {
            $table->id();
            //$table->integer('idpedido');
            $table->foreignId('idpedido')
            ->nullable()
            ->constrained('pedidos');

            $table->integer('operacion_pago');
            $table->string('status');
            $table->integer('formaPago_id');
            $table->text('log');
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
        Schema::dropIfExists('log_pagos');
    }
}
