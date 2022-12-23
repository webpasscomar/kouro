<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tipoMovimiento_id')
                ->nullable()
                ->constrained('tipomovimientos')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->foreignId('sku_id')
                ->nullable()
                ->constrained('sku')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->integer('cantidad');
            $table->timestamp('fecha');

            $table->integer('pedido_id');
            $table->integer('user_id');

            $table->tinyInteger('estado');

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
        Schema::dropIfExists('movimientos');
    }
}
