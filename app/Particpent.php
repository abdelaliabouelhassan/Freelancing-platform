<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Particpent extends Model
{
    protected  $guarded = [];


    public  function  user(){
        return $this->belongsTo(User::class,'to_user_id');
    }


    static  public  function  getusername($id){
    $user =     User::where('id',$id)->first();
    return $user->name;
    }
    static public  function  getimage($id){
        $user =  User::where('id',$id)->first();
        if($user->user_image){
            $image =  Image::where('id', $user->user_image)->first();
            return $image->path;
        }else{
            return null;
        }

    }

}
