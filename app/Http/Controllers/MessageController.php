<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Http\Resources\Message\fetchMessages;
use App\Message;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class MessageController extends Controller
{


    public function __construct()
    {
        $this->middleware('api');
    }
    public  function  fetchMessage($slug,$userslug){


//        $priverchat = Message::with('user')->where(['user_id'=>auth('api')->id(),'to_user_id'=>$to_user_id])
//            ->orWhere(function ($qury) use($user){
//                $qury->where(['user_id'=>$user_id,'to_user_id'=>auth()->id()]);
//            });

        $post =   Post::where('slug',$slug)->first();
        $user = User::where('slug',$userslug)->first();
        $user_id = $user->id;
        $to_user_id = $post->user_id;
        $currentuser_id = auth('api')->id();
        if($currentuser_id == $user_id){
            $to_user_id = $post->user_id;
        }else{
            $to_user_id =  $user->id;
        }

        if(!$user_id == $currentuser_id || !$to_user_id = $currentuser_id){
            return false;
        }

        return   fetchMessages::collection(Message::orderBy('id','DESC')->where('user_id',auth('api')->id())->where('to_user_id',$to_user_id)->orWhere('user_id',$to_user_id)->orWhere('to_user_id',auth('api')->id())->paginate(5));

    }
    public  function sendMessage(Request $request){
       $path =    $request->slug;
         $userslug =   Str::afterLast($path,'/');
          $slug =    Str::beforeLast($path, '/');

        $post =   Post::where('slug', $slug)->first();
        $to_user_id = $post->user_id;
        $user = User::where('slug',$userslug)->first();
        $user_id = $user->id;
        $currentuser_id = auth()->id();
        if($currentuser_id == $user_id){
            $user_id = $user->id;
            $to_user_id = $post->user_id;
        }else{
            $user_id = $to_user_id;
            $to_user_id =  $user->id;
        }
        if($user_id != $currentuser_id && $to_user_id != $currentuser_id){
            return false;
        }

         $path = '/Chat/' . $path;

        $message =  auth()->user()->message()->create(['message'=>$request->message,'to_user_id'=>$to_user_id,'user_id'=>$user_id,'url'=>$path]);
        broadcast(new MessageSent($message->load('user')))->toOthers();
        return $message;
        return response(['status'=>'message set Successfully']);
    }
}
