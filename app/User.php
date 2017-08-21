<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'code', 'artist', 'location', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * Get the song for the user.
     */
    public function song()
    {
        return $this->hasOne('App\Song');
    }

    /**
     * Get the song for the user.
     */
    public function video()
    {
        return $this->hasOne('App\Video');
    }
}
