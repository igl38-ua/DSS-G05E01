<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{public function up()
    {
        Schema::table('threads', function (Blueprint $table) {
            $table->dropForeign(['usuario']);
            $table->unsignedBigInteger('usuario')
                  ->nullable()
                  ->change();
            $table->foreign('usuario')
                  ->references('id')
                  ->on('usuario')
                  ->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('threads', function (Blueprint $table) {
            $table->dropForeign(['usuario']);
            $table->unsignedBigInteger('usuario')
                  ->nullable(false)
                  ->change();
            $table->foreign('usuario')
                  ->references('id')
                  ->on('usuario')
                  ->onDelete('cascade');
        });
    }
    
};
