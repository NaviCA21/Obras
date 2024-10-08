<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoTrabajadorTable extends Migration
{
    public function up()
    {
        Schema::create('tipo_trabajador', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');  // Ejemplo: Técnico, Obrero
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo_trabajador');
    }
};
