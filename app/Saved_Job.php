<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saved_Job extends Model
{
    protected  $guarded = [];

    public function post(){
        return $this->belongsTo('App\Post','post_id');
    }
    public  function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
