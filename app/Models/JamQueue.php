<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JamQueue extends Model
{
    protected $table = 'jam_queue';

    protected $fillable = [
        'track_uri',
        'track_name',
        'track_artist',
        'user_id',
    ];
}
