<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosCompraTable extends Migration
{
    public function up()
    {
        Schema::create('pedidos_compra', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requerimiento_id')->constrained('requerimientos');
            $table->foreignId('proveedor_id')->constrained('proveedores');
            $table->foreignId('informe_id')->constrained('informes');
            $table->foreignId('material_id')->constrained('materiales');
            $table->decimal('cantidad_pedida', 15, 2);
            $table->text('descripcion')->nullable();
            $table->enum('estado', ['en proceso', 'enviado', 'recibido'])->default('en proceso');
            $table->date('fecha_pedido');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedidos_compra');
    }
};
