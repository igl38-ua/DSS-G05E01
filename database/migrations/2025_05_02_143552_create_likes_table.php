<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            // clave al hilo
            $table->foreignId('thread_id')
                  ->constrained('threads')
                  ->onDelete('cascade');
            // clave al usuario (tu tabla se llama 'usuario')
            $table->foreignId('user_id')
                  ->constrained('usuario')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('likes');
    }
};

