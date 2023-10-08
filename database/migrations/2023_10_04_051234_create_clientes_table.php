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
            $table->integer('ci')->primary();
            $table->string('nombre');
            $table->string('genero');
            $table->integer('telefono')->nulable();
            $table->string('direccion')->nulable();
            $table->timestamps();

            // Definir la clave foránea
            $table->unsignedBigInteger('user_id'); // Asume que la columna de clave foránea se llama user_id
            $table->foreign('user_id')->references('id')->on('users');
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