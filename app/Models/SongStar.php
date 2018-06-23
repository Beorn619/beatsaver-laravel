<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SongStar extends Model
{
    /**
     * The attributes that are mass assignable
     */
    protected $fillable = [
        'song_id',
        'user_id'
    ];
}
