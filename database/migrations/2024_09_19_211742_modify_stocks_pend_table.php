<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('stocks_pend', function (Blueprint $table) {
            // Eliminar la columna sku_id si ya no es necesaria
            $table->dropForeign(['sku_id']);
            $table->dropColumn('sku_id');

            // Agregar las nuevas claves foráneas
            $table->foreignId('producto_id')->constrained('productos')->cascadeOnDelete();
            $table->foreignId('talle_id')->constrained('talles')->cascadeOnDelete();
            $table->foreignId('color_id')->constrained('colores')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('stocks_pend', function (Blueprint $table) {
            // Revertir los cambios

            // Eliminar las claves foráneas agregadas
            $table->dropForeign(['producto_id']);
            $table->dropForeign(['talle_id']);
            $table->dropForeign(['color_id']);
            $table->dropColumn(['producto_id', 'talle_id', 'color_id']);

            // Restaurar la columna sku_id si es necesario
            $table->foreignId('sku_id')->nullable()->constrained('sku');
        });
    }
};
