<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Message\fetchMessages;
use App\Http\Resources\Message\GetMsgChat;
use App\Http\Resources\Message\msgUser;
use App\Http\Resources\Post\PostCollection;
use App\Message;
use App\Particpent;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChatController extends Controller
{
        public  function  __construct()
        {
            return  $this->middleware('auth:api');
        }

    public function  getusertoAndFrom($slug)
    {
     $post =   Post::where('slug',$slug)->first();
     $user_id = $post->user_id;
       return msgUser::collection(User::where('id',$user_id)->paginate(1));
    }

    public  function  getchatmsg(){

        return GetMsgChat::collection(Particpent::where('user_id',auth('api')->id())->orWhere('to_user_id',auth('api')->id())->paginate(7));

        }

        public  function  getPostMessage(Request $request){
                $path =  $request->slug;
            $slug =    Str::beforeLast($path, '/');
          return  PostCollection::collection( Post::where('slug',$slug)->paginate(1));
        }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
