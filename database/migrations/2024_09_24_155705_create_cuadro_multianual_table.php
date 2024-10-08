<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuadroMultianualTable extends Migration
{
    public function up()
    {
        Schema::create('cuadro_multianual', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proyecto_id')->constrained('proyecto');
            $table->foreignId('informe_id')->constrained('informes');
            $table->foreignId('material_id')->constrained('materiales');
            $table->text('descripcion')->nullable();
            $table->date('fecha_inclusion');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cuadro_multianual');
    }
};
