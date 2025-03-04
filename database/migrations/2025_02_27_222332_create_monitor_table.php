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
        Schema::create('monitor', function (Blueprint $table) {
            // ID es igual que el de Empleado no autoincremental
            $table->unsignedInteger('id')->primary();
            $table->string('especialidad', 50)->nullable();
            $table->timestamps();
            $table->foreign('id')
                  ->references('id')
                  ->on('empleado')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitor');
    }
};
