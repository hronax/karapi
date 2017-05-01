<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'course_number'
    ];

    /**
     * Get the specialization for this group
     */
    public function specialization()
    {
        return $this->belongsTo('App\Specialization');
    }

    /**
     * Get the exams for this group
     */
    public function exams()
    {
        return $this->hasMany('App\Exam');
    }

    /**
     * Get the schedules for this group
     */
    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }

    /**
     * Get the changes for this group
     */
    public function changes()
    {
        return $this->hasMany('App\Change');
    }
}
