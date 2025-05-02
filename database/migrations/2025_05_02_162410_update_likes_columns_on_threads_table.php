<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Para renombrar necesitas doctrine/dbal
        // composer require doctrine/dbal
        Schema::table('threads', function (Blueprint $table) {
            $table->renameColumn('views', 'likes');           // views  →  likes
            $table->unsignedInteger('dislikes')->default(0);  // nuevo contador
        });
    }

    public function down(): void
    {
        Schema::table('threads', function (Blueprint $table) {
            $table->renameColumn('likes', 'views');
            $table->dropColumn('dislikes');
        });
    }
};
