<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provincias', function (Blueprint $table) {
            $table->id();   //->primary()
            $table->string('categoria',255)->nullable();
            $table->decimal('centroide_lat',15,4)->nullable();
            $table->decimal('centroide_lon',15,4)->nullable();
            $table->string('fuente',255)->nullable();
            $table->string('iso_id',255)->nullable();
            $table->string('iso_nombre',255)->nullable();
            $table->string('nombre',255)->nullable();
            $table->string('nombre_completo',255)->nullable();
            $table->tinyInteger('estado')->nullable()->default(1);
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
        Schema::dropIfExists('provincias');
    }
}
