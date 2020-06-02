<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use Sluggable;
    protected  $guarded = [];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true,
            ]
        ];
    }

    public  function  user()
    {
        return $this->belongsTo('App\User');
    }

    public  function category()
    {
        return $this->belongsTo('App\Category');
    }

    public  function image()
    {
        return $this->belongsTo('App\Image');
    }
    public  function city()
    {
        return $this->belongsTo('App\City');
    }

}


