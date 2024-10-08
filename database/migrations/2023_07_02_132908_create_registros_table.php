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
        Schema::create('registros', function (Blueprint $table) {
            $table->increments('idControl');
            $table->string('dni', 8);
            $table->string('visitante', 255);
            // $table->string('sexo', 25);
            $table->boolean('sexo')->default(false);
            $table->string('entidad', 255);
            $table->string('motivo', 255)->nullable();
            $table->string('observacion', 255)->nullable();
            $table->string('img_path')->nullable();
            $table->string('nombre_usuario')->nullable(); // Nueva columna para almacenar el nombre del usuario
            $table->timestamps();
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
