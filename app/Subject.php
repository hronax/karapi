<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get specialization list where this subject exists
     */
    public function specializations()
    {
        return $this->belongsToMany('App\Specialization', 'subject_specialization');
    }

    /**
     * Get specialization list where this subject exists
     */
    public function exams()
    {
        return $this->hasMany('App\Exam');
    }
}
