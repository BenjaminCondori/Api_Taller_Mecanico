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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('placa')->unique();
            $table->string('nro_chasis')->unique();
            $table->integer('año');
            $table->string('color');

            // Definir la clave foránea
            $table->unsignedBigInteger('marca_id'); 
            $table->foreign('marca_id')->references('id')->on('marcas');

            $table->unsignedBigInteger('modelo_id'); 
            $table->foreign('modelo_id')->references('id')->on('modelos');

            $table->unsignedBigInteger('cliente_id'); 
            $table->foreign('cliente_id')->references('id')->on('clientes');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
