<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialesTable extends Migration
{
    public function up()
    {
        Schema::create('materiales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_material');
            $table->text('descripcion')->nullable();
            $table->string('unidad_medida');
            $table->decimal('cantidad_presupuestada', 15, 2);
            $table->decimal('cantidad_actual', 15, 2)->default(0);
            $table->decimal('precio_unitario_presupuestado', 15, 2);
            $table->decimal('precio_real', 15, 2)->nullable();
            $table->enum('estado_cuadro', ['pendiente', 'incluido'])->default('pendiente');
            $table->enum('estado_pedido', ['no solicitado', 'en proceso', 'pedido'])->default('no solicitado');
            $table->enum('estado_devengado', ['no devengado', 'devengado'])->default('no devengado');
            $table->enum('prioridad', ['alta', 'media', 'baja'])->default('media');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('materiales');
    }
};
