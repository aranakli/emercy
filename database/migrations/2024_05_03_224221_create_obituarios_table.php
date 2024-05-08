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
        Schema::create('obituarios', function (Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->string('nombre');
            $table->string('apellido');
            $table->date('fecha_nacimiento');
            $table->date('fecha_muerte');
            $table->timestamp('fecha_exequias');
            $table->string('lugar_exequias');
            $table->string('imagen');
            $table->unsignedBigInteger('sala_id');
            $table->foreign('sala_id')->references('id')->on('salas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obituarios');
    }
};
