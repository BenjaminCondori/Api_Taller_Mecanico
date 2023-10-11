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
        Schema::create('empleado', function (Blueprint $table) {
            $table->id();
            $table->integer('ci')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->char('genero', 1);
            $table->integer('telefono');
            $table->string('direccion');
            $table->unsignedBigInteger('user_id')->nullable(); // Asume que la columna de clave foránea se llama user_id
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('puesto_id'); // Clave foránea a la tabla "puesto"
            $table->foreign('puesto_id')->references('id')->on('puesto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado');
    }
};
