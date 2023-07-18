<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('control_herramienta', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('control_id');
            $table->unsignedInteger('herramienta_id');

            $table->foreign('control_id')->references('idControl')->on('registros')->onDelete('cascade');
            $table->foreign('herramienta_id')->references('idHerramienta')->on('herramientas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('control_herramientas');
    }
};
