<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('suscripcion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ID_Usuario')
                  ->constrained('usuario')
                  ->cascadeOnDelete();
            $table->string('plan', 100);
            $table->decimal('precio', 8, 2);
            $table->date('fecha_inicio');
            $table->date('fecha_expiracion');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('suscripcion');
    }
};
