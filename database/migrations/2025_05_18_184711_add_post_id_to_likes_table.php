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
        Schema::table('likes', function (Blueprint $table) {
            // Si no existe, la añadimos nullable para no romper registros viejos
            if (!Schema::hasColumn('likes', 'post_id')) {
                $table->foreignId('post_id')
                    ->nullable()
                    ->constrained()           // por defecto referencia a 'posts'
                    ->cascadeOnDelete()
                    ->after('user_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('likes', function (Blueprint $table) {
            $table->dropConstrainedForeignId('post_id');
        });
    }

};
