<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
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
     * Get the user that owns the song.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
