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
        Schema::create('entrenador_personal', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary();
            $table->decimal('suplemento_nomina', 10, 2);
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
        Schema::dropIfExists('entrenadorPersonal');
    }
};
