<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use \Conner\Tagging\Taggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'type', 'period', 'text', 'image_name', 'category_id', 'is_top'
    ];

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
