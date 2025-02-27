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
        Schema::create('fecha', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dia');
            $table->integer('mes');
            $table->integer('anyo');
            $table->integer('hora');
            $table->integer('minutos');
            $table->unsignedInteger('ID_Empleado')->nullable();
            $table->timestamps();
            $table->foreign('ID_Empleado')
                  ->references('id')
                  ->on('empleado')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fecha');
    }
};
