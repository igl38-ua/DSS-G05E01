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
            $table->string('google_id')->nullable()->unique()->after('id'); // ID �nico de Google
            $table->string('avatar')->nullable()->after('email'); // URL del avatar
            $table->string('password')->nullable()->change(); // Hacer la contrase�a opcional
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuario', function (Blueprint $table) {
            //if (!($this->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\SqlitePlatform)) {
                $table->string('password')->nullable(false)->change();
            //}

            $table->dropUnique(['google_id']);
            $table->dropColumn(['google_id', 'avatar']);
        });
    }
};
