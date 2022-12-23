<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_item', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pedido_id')
                ->nullable()
                ->constrained('pedidos')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->foreignId('sku_id')
                ->nullable()
                ->constrained('sku')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->decimal('cantidad', $precision = 6, $scale = 2);
            $table->decimal('precioUnitario', $precision = 6, $scale = 2);
            $table->decimal('precioItem', $precision = 6, $scale = 2);

            $table->boolean('vacio');

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
        Schema::dropIfExists('pedido_item');
    }
}
