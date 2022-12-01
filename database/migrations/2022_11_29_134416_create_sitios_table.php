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
            $table->string('direccion');
            $table->string('codigoPostal');

            $table->string('googleMap');
            $table->string('googleAnalytics');

            $table->string('icon');
            $table->string('qr');

            $table->string('instagram');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('linkedin');
            $table->string('youtube');

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
        Schema::dropIfExists('sitio');
    }
}
