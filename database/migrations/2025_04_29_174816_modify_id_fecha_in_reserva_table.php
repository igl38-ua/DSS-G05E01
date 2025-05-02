<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('reserva', function (Blueprint $table) {
        $table->timestamp('ID_Fecha')->nullable()->change(); // Permitir valores nulos si es necesario
    });
}

public function down()
{
    Schema::table('reserva', function (Blueprint $table) {
        $table->timestamp('ID_Fecha')->nullable(false)->change(); // Revertir a NOT NULL si es necesario
    });
}
};
