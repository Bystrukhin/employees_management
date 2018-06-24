<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'sick', 'user_id', 'location_id', 'created_at'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function locations()
    {
        return $this->belongsTo('App\Location', 'location_id');
    }

}
