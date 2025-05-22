<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameUserIdToUsuarioOnThreads extends Migration
{
    public function up()
    {
        Schema::table('threads', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->renameColumn('user_id', 'usuario');
        });
    }

    public function down()
    {
        Schema::table('threads', function (Blueprint $table) {
            $table->renameColumn('usuario', 'user_id');
            $table->foreign('user_id')->references('id')->on('usuario');
        });
    }
}
