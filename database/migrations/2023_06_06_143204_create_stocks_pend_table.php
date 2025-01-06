<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksPendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks_pend', function (Blueprint $table) {
            $table->id();
            // Clave foránea a productos (producto_id)
            // $table->foreignId('producto_id')->constrained('productos')->cascadeOnDelete();
            // Clave foránea a talles (talle_id)
            // $table->foreignId('talle_id')->constrained('talles')->cascadeOnDelete();
            // Clave foránea a colores (color_id)
            // $table->foreignId('color_id')->constrained('colores')->cascadeOnDelete();
            $table->foreignId('sku_id')->nullable()->constrained('sku', 'id')->nullOnDelete();
            $table->timestamp('fechaSolicitud')->nullable();
            $table->timestamp('fechaRespuesta')->nullable();
            $table->text('respuesta')->nullable();
            $table->text('email')->nullable();
            $table->integer('cantidad')->nullable();
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
        Schema::dropIfExists('stocks_pend');
    }
}
