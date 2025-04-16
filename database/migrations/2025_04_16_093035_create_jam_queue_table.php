<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('jam_queue', function (Blueprint $table) {
            $table->id();
            $table->string('track_uri'); // El URI de la canción en Spotify (ejemplo: spotify:track:...)
            $table->string('track_name')->nullable();
            $table->string('track_artist')->nullable();
            $table->unsignedBigInteger('user_id')->nullable(); // Si deseas asociar la canción a un usuario
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jam_queue');
    }
};
