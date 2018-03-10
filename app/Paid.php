<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paid extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'year',
    ];

    /**
     * Get the registration that owns the paid.
     */
    public function registration()
    {
        return $this->belongsTo('App\Registration');
    }
}
