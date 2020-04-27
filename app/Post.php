<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected  $guarded = [];


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


