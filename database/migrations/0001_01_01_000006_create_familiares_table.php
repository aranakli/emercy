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
        Schema::create('familiares', function (Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->unsignedBigInteger('obituario_id');
            $table->foreign('obituario_id')->references('id')->on('obituarios');
            $table->string('nombre_familiar');
            $table->mediumInteger('telefono_familiar');
            $table->string('parentesco_familiar');
            $table->string('email_familiar');
            $table->boolean('autoriza_familiar');
            $table->boolean('estado_familiar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('familiares');
    }
};
