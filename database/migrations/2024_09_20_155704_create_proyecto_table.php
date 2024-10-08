<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectoTable extends Migration
{
    public function up()
    {
        Schema::create('proyecto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->decimal('presupuesto_inicial', 15, 2);
            $table->decimal('presupuesto_proyectado', 15, 2);
            $table->decimal('presupuesto_actual', 15, 2);
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proyecto');
    }
};
