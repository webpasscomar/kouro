<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('desCorta');
            $table->string('descLarga');
            $table->string('codigo');

            $table->string('presentacion_id');
            $table->string('impuesto_id');

            $table->string('precioLista');

            $table->string('precioOferta');
            $table->string('ofertaDesde');
            $table->string('ofertaHasta');

            $table->string('peso');
            $table->string('tamano');
            $table->string('link');
            $table->string('etiquetas');

            $table->string('orden');
            $table->string('unidadVenta');
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
        Schema::dropIfExists('productos');
    }
}
