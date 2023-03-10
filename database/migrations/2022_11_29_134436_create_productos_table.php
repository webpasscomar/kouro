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
			$table->text('descLarga');
			$table->string('codigo')->nullable();
			$table->foreignId('presentacion_id')
				->nullable()
				->constrained('presentaciones')
				->cascadeOnUpdate()
				->nullOnDelete();

			$table->string('precioLista');

			$table->string('precioOferta')->nullable();
			$table->string('ofertaDesde')->nullable();
			$table->string('ofertaHasta')->nullable();

			$table->string('peso')->nullable();;
			$table->string('tamano')->nullable();;
			$table->string('link')->nullable();;

			$table->string('orden')->default(0);
			$table->string('unidadVenta')->default(0);

			$table->tinyInteger('destacar')->default(0);
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
