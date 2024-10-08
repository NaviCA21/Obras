<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareosTable extends Migration
{
    public function up()
    {
        Schema::create('tareos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trabajador_id')->constrained('trabajadores');
            $table->foreignId('proyecto_id')->constrained('proyecto');
            $table->foreignId('informe_id')->constrained('informes');
            $table->text('descripcion')->nullable();
            $table->decimal('monto', 15, 2);
            $table->enum('tipo_personal', ['tecnico', 'obrero']);
            $table->date('fecha_tareo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tareos');
    }
};
