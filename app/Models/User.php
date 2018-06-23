<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements Authenticatable
{
    use AuthenticatableTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'is_verified'
    ];

    /**
     * The attributes that should be hidden for arrays
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Attributes converted to Carbon
     */
    protected $dates = ['deleted_at'];

    /**
     * Gets songs this user has uploaded
     */
    public function songs()
    {
        return $this->hasMany('App\Models\Song');
    }

    /**
     * Get whether this user is verified
     */
    public function verifyUser()
    {
        return $this->hasOne('App\Models\VerifyUser');
    }

    /**
     * Gets all the songs this user has starred
     */
    public function starredSongs()
    {
        return $this->hasMany('App\Models\StarredSong');
    }
}
