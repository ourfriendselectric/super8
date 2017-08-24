<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'filename',
    ];

    /**
     * Get the registration that owns the song.
     */
    public function registration()
    {
        return $this->belongsTo('App\Registration');
    }
}
