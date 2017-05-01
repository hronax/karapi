<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
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
     * Get the specializations for this department
     */
    public function specializations()
    {
        return $this->hasMany('App\Specialization');
    }
}
