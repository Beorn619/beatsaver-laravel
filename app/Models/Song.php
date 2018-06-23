<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Song extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable
     */
    protected $fillable = [
        'uploader_id'
    ];

    /**
     * Attributes converted to Carbon
     */
    protected $dates = ['deleted_at'];

    /**
     * Gets the user who uploaded the song
     */
    public function uploader()
    {
        return $this->belongsTo('\App\Models\User', 'uploader_id');
    }

    /**
     * Gets the song details
     */
    public function details()
    {
        return $this->hasMany('\App\Models\SongDetail');
    }

    /**
     * Gets the star entries
     */
    public function stars()
    {
        return $this->hasMany('App\Models\SongStar');
    }
}
