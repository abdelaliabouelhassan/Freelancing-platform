<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostCollection;
use App\Http\Resources\Profile\SavedPostCollection;
use App\Mybid;
use App\Post;
use App\Saved_Job;
use App\User;
use App\User_info;
use App\Experience;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $id = auth('api')->id();
        return   User::where('id',$id)->with('image','city','category','backimage')->paginate(1);
    }


    public function updateProfileImage(Request $request)
    {
     $user  =  User::findOrFail(auth('api')->id());
     if($request->data){
         $name = time() . '.'  . explode('/',explode(':',substr($request->data,0,strpos($request->data,';')))[1])[1];
         $img =   Image::make($request->data);
         $img->resize('170','170')->save(public_path('store/images/').$name);
         $imageid = \App\Image::create(['path'=>'store/images/' . $name]);
         $request['data'] = $imageid->id;

         $img = \App\Image::find($user->user_image);
         if($img){
             $oldimg = public_path( $img->path );
             if(file_exists($oldimg)){
                 unlink($oldimg);
                 $img->delete();
             }
         }

         if($imageid){
             $user->update(['user_image'=>$request['data']]);
         }
     }
    }
    public function UpdateBackGroundImage(Request $request)
    {
        $user  =  User::findOrFail(auth('api')->id());
        if($request->data){
            $name = time() . '.'  . explode('/',explode(':',substr($request->data,0,strpos($request->data,';')))[1])[1];
            $img =   Image::make($request->data);
            $img->resize('1600','500')->save(public_path('store/images/').$name);
            $imageid = \App\Image::create(['path'=>'store/images/' . $name]);
            $request['data'] = $imageid->id;

            $img = \App\Image::find($user->user_backgroundImage);
            if($img){
                $oldimg = public_path( $img->path );
                if(file_exists($oldimg)){
                    unlink($oldimg);
                    $img->delete();
                }
            }

            if($imageid){
                $user->update(['user_backgroundImage'=>$request['data']]);
            }
        }
    }

    public  function  feed(){
        $post =  Post::latest()->orderBy('id')->where('user_id',auth('api')->id())->paginate(5);
        return PostCollection::collection($post);
    }

    public  function  savejob()
    {
         $save = Saved_Job::where('user_id',auth('api')->id())->with('post')->paginate(5);
        return SavedPostCollection::collection($save);
    }

    public function myBids(){
        $bids = Mybid::where('user_id',auth('api')->id())->with('post')->paginate(5);
        return SavedPostCollection::collection($bids);
    }
    public function overview(Request $request){

        $this->validate($request,[
            'overview'=>'required|min:50',
        ]);
        $overview = User_info::where('user_id',auth()->id())->get();
        if( count($overview) != 0){
            $overview = User_info::where('user_id',auth()->id());
             $overview->update(['overview'=>$request->overview]);
            return ['Brikol'=>'(:','errorcode'=>'Updated'];
        }else{
             User_info::create(['user_id'=>auth('api')->id(),'overview'=>$request->overview]);
            return ['Brikol'=>'(:','errorcode'=>'Created'];
        }
    }

    public function getoverview(){
        $overview =  User_info::where('user_id',auth('api')->id())->first('overview');
        return $overview;
    }
    public  function addExperience(Request $request){
        $this->validate($request,[
            'ExpTitle'=>'required|min:3',
            'ExpBody'=>'required|min:50'

        ]);
        Experience::create(['title'=>$request->ExpTitle,'body'=>$request->ExpBody,'user_id'=>auth('api')->id()]);
        return ['brikol'=>'(:'];
    }
    public function getExperience(){
       $exp = Experience::latest()->orderBy('id')->where('user_id',auth('api')->id())->paginate(5);
       return $exp;
    }
    public  function  UpdateExperience(Request $request){
        $this->validate($request,[
            'ExpTitle'=>'required|min:3',
            'ExpBody'=>'required|min:50'

        ]);
        $exp = Experience::where('user_id',auth('api')->id())->where('id',$request->ExpId);
        if($exp){
              $exp->update(['title'=>$request->ExpTitle,'body'=>$request->ExpBody]);
            return ['brikol'=>'(:'];
        }else{
            return ['brikol'=>'):'];
        }
    }
    public  function  DeleteExperience(Request $request){
        $exp = Experience::where('user_id',auth('api')->id())->where('id',$request->ExpId);
        if($exp){
            $exp->delete();
            return ['brikol'=>'(:'];
        }else{
            return ['brikol'=>'):'];
        }
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
