<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Change extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'class_number', 'date'
    ];

    /**
     * Get the auditory for this change
     */
    public function auditory()
    {
        return $this->hasOne('App\Auditory');
    }

    /**
     * Get the group for this change
     */
    public function group()
    {
        return $this->hasOne('App\Group');
    }

    /**
     * Get the subject for this change
     */
    public function subject()
    {
        return $this->hasOne('App\Subject');
    }

    /**
     * Get the teacher for this change
     */
    public function teacher()
    {
        return $this->hasOne('App\Teacher');
    }

    /**
     * Get the class number and time for this change
     */
    public function pair()
    {
        return $this->hasOne('App\Pair');
    }
}
