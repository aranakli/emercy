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
            $table->id()->primary();
            $table->string('nombre_cliente');
            $table->integer('nit_cliente');
            $table->string('direccion_cliente');
            $table->string('telefono_cliente');
            $table->string('email_cliente')->unique();
            $table->boolean('estado_cliente');
            $table->timestamps();
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
