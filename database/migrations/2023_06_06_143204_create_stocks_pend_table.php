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
            $table->foreignId('sku_id')->nullable()->constrained('sku');
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
