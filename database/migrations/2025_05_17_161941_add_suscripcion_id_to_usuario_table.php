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
        Schema::table('usuario', function (Blueprint $table) {
            // FK a la suscripción activa
            $table->unsignedBigInteger('suscripcion_id')->nullable()->after('payment_method');
            $table->foreign('suscripcion_id')
                  ->references('id')->on('suscripcion')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuario', function (Blueprint $table) {
            $table->dropForeign(['suscripcion_id']);
            $table->dropColumn('suscripcion_id');
        });
    }
};
