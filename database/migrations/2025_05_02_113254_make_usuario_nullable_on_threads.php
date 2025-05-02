<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{public function up()
    {
        Schema::table('threads', function (Blueprint $table) {
            // Si tienes foreign key, quítala primero
            $table->dropForeign(['usuario']);
    
            // Cambia la columna a nullable
            $table->unsignedBigInteger('usuario')
                  ->nullable()
                  ->change();
    
            // Y vuelve a reaplicar la FK si quieres
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
