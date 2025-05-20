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
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50);
            $table->string('email', 100);
            $table->string('telefono', 15)->nullable();
            $table->string('password', 50);
            $table->date('fecha_inscripcion')->nullable();
            $table->string('rol', 20);
            $table->string('payment_method')->nullable()->after('rol');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
