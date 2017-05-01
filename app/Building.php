<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the pairs for this building
     */
    public function pairs()
    {
        return $this->hasMany('App\Pair');
    }

    /**
     * Get the auditories list for this building
     */
    public function auditories()
    {
        return $this->hasMany('App\Auditory');
    }
}
