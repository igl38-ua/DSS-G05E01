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
        Schema::create('reserva', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ID_Usuario');
            $table->unsignedInteger('ID_Clase');
            $table->unsignedInteger('ID_Fecha');
            $table->timestamps();
            $table->foreign('ID_Usuario')
                  ->references('id')
                  ->on('usuario')
                  ->onDelete('cascade');
            $table->foreign('ID_Clase')
                  ->references('id')
                  ->on('clase')
                  ->onDelete('cascade');
            $table->foreign('ID_Fecha')
                  ->references('id')
                  ->on('fecha')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva');
    }
};
