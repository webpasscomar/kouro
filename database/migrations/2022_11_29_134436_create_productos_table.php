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

			$table->foreignId('presentacion_id')
				->nullable()
				->constrained('presentaciones')
				->cascadeOnUpdate()
				->nullOnDelete();

			$table->foreignId('impuesto_id')
				->nullable()
				->constrained('impuestos')
				->cascadeOnUpdate()
				->nullOnDelete();

			$table->string('precioLista');

			$table->string('precioOferta')->nullable();
			$table->string('ofertaDesde')->nullable();
			$table->string('ofertaHasta')->nullable();

			$table->string('peso');
			$table->string('tamano');
			$table->string('link');
			$table->string('etiquetas');

			$table->string('orden');
			$table->string('unidadVenta');
			$table->tinyInteger('estado')->default(1);


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
