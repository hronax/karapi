<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pair extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'class_number', 'time_start', 'time_end'
    ];

    /**
     * Get building of the pair.
     */
    public function building()
    {
        return $this->belongsTo('App\Building');
    }
}
