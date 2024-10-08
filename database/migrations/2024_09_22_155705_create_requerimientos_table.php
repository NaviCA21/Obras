<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequerimientosTable extends Migration
{
    public function up()
    {
        Schema::create('requerimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proyecto_id')->constrained('proyecto');
            $table->foreignId('informe_id')->constrained('informes');
            $table->foreignId('material_id')->constrained('materiales');
            $table->decimal('cantidad', 15, 2);
            $table->text('descripcion')->nullable();
            $table->enum('estado', ['inicial', 'pedido', 'recibido', 'devengado'])->default('inicial');
            $table->date('fecha_requerimiento');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('requerimientos');
    }
};
