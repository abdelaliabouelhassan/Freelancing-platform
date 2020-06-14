<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mybid;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class BidsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

      public  function BidNow($path,$slug){

        //email active is 1
        //phone active is and email  2
        // 0 mean false

         $user = auth('api')->user();
         if($user->is_active == 0 ){
             return response()->json([
                 'message' => trans('messages.youcantbid')], 405 );
         }
         elseif ($user->is_active == 1 ){
             return response()->json([
             'message' =>trans('messages.youcantbidphone') ], 405 );
         }
         elseif ($user->is_active  == 2 ){
             $postSlug =   Str::afterLast($path,'/');
             $slug =    Str::beforeLast($slug, '/');
             $post = Post::where('slug',$postSlug)->first();
             if($post->type == 'job'){
                 $user = User::where('slug',$slug)->first();
                 if($user){

                     $bid = Mybid::where('user_id',auth('api')->id())->where('post_id',$post->id)->where('with',$user->id)->get();
                     if(count($bid) == 0 ){
                         $bid = Mybid::create(['user_id'=>auth('api')->id(),'post_id'=>$post->id,'with'=>$user->id]);
                         $bid2 = Mybid::create(['user_id'=>$user->id,'post_id'=>$post->id,'with'=>auth('api')->id()]);
                         return response()->json([
                             'message' => trans('messages.heir')], 200);
                     }else{
                         return response()->json([
                             'message' => trans('messages.alreadyheir')], 200);
                     }

                 }else{
                     return response()->json([
                         'message' => trans('messages.wrong')], 405 );
                 }
             }else{
                 if($post){
                     if($post->user_id == auth('api')->id() && $post->type != 'job'){
                         return response()->json([
                             'message' => trans('messages.youcantYourself')], 405 );
                     }else{
                         $bids = Mybid::where('user_id',auth('api')->id())->where('post_id',$post->id)->where('with',$post->user_id)->get();
                         if(count($bids) == 0 ){
                         $bid = Mybid::create(['user_id'=>auth('api')->id(),'post_id'=>$post->id,'with'=>$post->user_id]);
                         $bid2 = Mybid::create(['user_id'=>$post->user_id,'post_id'=>$post->id,'with'=>auth('api')->id()]);
                         return response()->json([
                             'message' => trans('messages.bid')], 200);
                     }else{
                             return response()->json([
                                 'message' => trans('messages.alreadybid')], 200);
                         }
                  }

                 }else{
                     return response()->json([
                         'message' => trans('messages.wrong')], 405 );

                 }

             }



         }



      }
}
