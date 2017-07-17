<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'filename'
    ];

    /**
     * Get the user that owns the upload.
     */
    public function post()
    {
        return $this->belongsTo('App\User');
    }
}
