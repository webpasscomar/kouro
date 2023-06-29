<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormasdepagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formasdepagos' , function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->tinyInteger('estado')->default(0);
            $table->string('logo');
            $table->timestamps();
            $table->tinyInteger('cobra')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formasdepagos');
    }
}
