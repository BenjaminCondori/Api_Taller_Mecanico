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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            // $table->integer('ci')->primary();
            $table->integer('ci')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->char('genero', 1);
            $table->integer('telefono')->nulable();
            $table->string('direccion')->nulable();
            $table->timestamps(); 

            // Definir la clave foránea
            $table->unsignedBigInteger('usuario_id')->nullable(); // Asume que la columna de clave foránea se llama user_id
            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
