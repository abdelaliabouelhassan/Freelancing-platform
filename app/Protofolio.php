<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Protofolio extends Model
{
    protected  $guarded = [];


    public  function image(){
        return $this->belongsTo('App\Image','image_id');
    }
}
