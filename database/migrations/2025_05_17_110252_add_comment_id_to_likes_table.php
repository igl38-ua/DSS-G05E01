<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommentIdToLikesTable extends Migration
{
    public function up()
    {
        Schema::table('likes', function (Blueprint $table) {
            // Permitimos NULL para no romper los likes de threads existentes
            $table->foreignId('comment_id')
                  ->nullable()
                  ->after('thread_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // Índice único para que cada usuario sólo pueda dar 1 like a un mismo comentario
            $table->unique(['user_id','comment_id'], 'likes_user_comment_unique');
        });
    }

    public function down()
    {
        Schema::table('likes', function (Blueprint $table) {
            $table->dropUnique('likes_user_comment_unique');
            $table->dropForeign(['comment_id']);
            $table->dropColumn('comment_id');
        });
    }
}
