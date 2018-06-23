<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SongDetail extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable
     */
    protected $fillable = [
        'song_id',
        'name',
        'sub_name',
        'author',
        'cover_img',
        'download_name',
        'download_count',
        'bpm',
        'difficulty_levels',
    ];

    /**
     * Attributes converted to Carbon
     */
    protected $dates = ['deleted_at'];

    protected $touches = ['song'];

    /**
     * Gets the song these details are about
     */
    public function song()
    {
        return $this->belongsTo('App\Models\Song');
    }
}
