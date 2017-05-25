<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use \Conner\Tagging\Taggable;

    /**
     * Get all of the tasks for the user.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'news';
}
