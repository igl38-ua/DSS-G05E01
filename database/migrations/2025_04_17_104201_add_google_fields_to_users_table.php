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
            $table->string('google_id')->nullable()->unique()->after('id'); // ID único de Google
            $table->string('avatar')->nullable()->after('email'); // URL del avatar
            $table->string('password')->nullable()->change(); // Hacer la contraseña opcional
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuario', function (Blueprint $table) {
              // Comprueba si la plataforma soporta la reversión de nullable si quieres ser muy cuidadoso
            //if (!($this->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\SqlitePlatform)) {
                $table->string('password')->nullable(false)->change();
            //} // Nota: Revertir nullable puede ser complejo dependiendo del DB Driver y contenido. Simplificamos aquí.

            $table->dropUnique(['google_id']); // Importante quitar el índice unique
            $table->dropColumn(['google_id', 'avatar']);
        });
    }
};
