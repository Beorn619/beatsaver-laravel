<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    /**
     * The attributes that are mass assignable
     */
    protected $fillable = [
        'user_id',
        'token'
    ];

    /**
     * Get user that needs/already has verification
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
