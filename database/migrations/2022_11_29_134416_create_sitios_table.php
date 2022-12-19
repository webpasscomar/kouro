<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitio', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('logo');
            $table->string('url');
            $table->string('correo');
            $table->string('razonSocial');
            $table->string('direccion')->nullable();
            $table->string('codigoPostal')->nullable();

            $table->string('googleMap')->nullable();
            $table->string('googleAnalytics')->nullable();

            $table->string('icon')->nullable();
            $table->string('qr')->nullable();

            $table->string('instagram')->default('');
            $table->string('facebook')->default('');
            $table->string('twitter')->default('');
            $table->string('linkedin')->default('');
            $table->string('youtube')->default('');

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
        Schema::dropIfExists('sitio');
    }
}
