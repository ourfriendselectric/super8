<?php

namespace App;

use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'code', 'artist', 'location', 'phone', 'paid',
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
     * Get the paid for the user.
     */
    public function paid()
    {
        return $this->hasOne('App\Paid');
    }

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

    /**
     * Get the song for the user.
     */
    public function hasPaid()
    {
        return $this->paid ? true : false;
    }
}
