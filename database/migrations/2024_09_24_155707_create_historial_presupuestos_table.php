<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialPresupuestosTable extends Migration
{
    public function up()
    {
        Schema::create('historial_presupuestos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proyecto_id')->constrained('proyecto');
            $table->decimal('presupuesto_inicial', 15, 2)->nullable();
            $table->decimal('presupuesto_proyectado', 15, 2)->nullable();
            $table->decimal('presupuesto_actual', 15, 2)->nullable();
            $table->text('descripcion_cambio')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('historial_presupuestos');
    }
};
