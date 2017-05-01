<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auditory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
    ];

    /**
     * Get the building of this auditory
     */
    public function building()
    {
        return $this->belongsTo('App\Building');
    }

    /**
     * Get the pairs in this auditory
     */
    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }
}
