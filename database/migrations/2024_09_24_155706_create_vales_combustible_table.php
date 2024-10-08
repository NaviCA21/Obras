<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValesCombustibleTable extends Migration
{
    public function up()
    {
        Schema::create('vales_combustible', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proyecto_id')->constrained('proyecto');
            $table->foreignId('informe_id')->constrained('informes');
            $table->decimal('cantidad', 15, 2);
            $table->text('descripcion')->nullable();
            $table->date('fecha_vale');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vales_combustible');
    }
};
