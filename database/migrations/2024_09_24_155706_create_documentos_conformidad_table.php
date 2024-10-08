<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosConformidadTable extends Migration
{
    public function up()
    {
        Schema::create('documentos_conformidad', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id')->constrained('pedidos_compra');
            $table->foreignId('informe_id')->constrained('informes');
            $table->foreignId('material_id')->constrained('materiales');
            $table->text('descripcion')->nullable();
            $table->date('fecha_conformidad');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('documentos_conformidad');
    }
};
