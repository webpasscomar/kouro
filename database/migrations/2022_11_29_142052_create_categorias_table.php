<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->integer('categoriaPadre_id');
            $table->integer('idioma_id');
            $table->string('categoria');
            $table->string('descripcion');
            $table->string('slug');
            $table->string('imagen');
            $table->integer('menu');
            $table->integer('orden');
            $table->integer('modulo_id');
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
        Schema::dropIfExists('categorias');
    }
}
