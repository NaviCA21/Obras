<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformesTable extends Migration
{
    public function up()
    {
        Schema::create('informes', function (Blueprint $table) {
            $table->id();
            $table->string('numero_informe')->unique();
            $table->string('nombre_informe');
            $table->text('descripcion')->nullable();
            $table->date('fecha_informe');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('informes');
    }
};
