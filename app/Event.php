<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * Get all of the tasks for the user.
     */
    public function category()
    {
        return $this->hasOne('App\Category');
    }
}
