<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'code'
    ];

    protected $attributes = array(
        'code' => '0'
    );

    /**
     * Get department of the specialization.
     */
    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    /**
     * Get subjects list
     */
//    public function subjects()
//    {
//        return $this->belongsToMany('App\Subject', 'subject_specialization');
//    }
}
