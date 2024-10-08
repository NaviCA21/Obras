<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajadoresTable extends Migration
{
    public function up()
    {
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('dni')->unique();
            $table->string('cargo');
            $table->foreignId('tipo_trabajador_id')->constrained('tipo_trabajador');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trabajadores');
    }
};
