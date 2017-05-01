<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'date'
    ];

    /**
     * Get group
     */
    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    /**
     * Get subject
     */
    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    /**
     * Get teacher
     */
    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

    /**
     * Get auditory
     */
    public function auditory()
    {
        return $this->belongsTo('App\Auditory');
    }
}
