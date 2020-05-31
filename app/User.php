<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Cviebrock\EloquentSluggable\Sluggable;
use Overtrue\LaravelFollow\Followable;
class User extends Authenticatable
{
    use Notifiable,HasApiTokens,Sluggable,Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function addNew($input)
    {
        $check = static::where('facebook_id',$input['facebook_id'])->first();


        if(is_null($check)){
            return static::create($input);
        }


        return $check;
    }


    public function post()
    {
        return $this->hasMany('App\Post');
    }
    public  function  image(){
        return $this->belongsTo('App\Image','user_image');
    }
    public  function  backimage(){
        return $this->belongsTo('App\Image','user_backgroundImage');
    }
    public  function  city(){
        return $this->belongsTo('App\City');
    }
    public  function  category(){
        return $this->belongsTo('App\Category');
    }
    public  function getnameAttribute($value){
        return ucfirst($value);
    }
    public static function UserId($slug)
    {
        $user =     User::where('slug',$slug)->first();
        return $user->id;
    }

    public function ip_address()
    {
        return $this->hasMany('App\Ip_Address');
    }
}
