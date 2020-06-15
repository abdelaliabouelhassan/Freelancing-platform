<?php

namespace App\Http\Controllers\API;

use App\City;
use App\Education;
use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostCollection;
use App\Http\Resources\Profile\ProtfolioCollection;
use App\Http\Resources\Profile\SavedPostCollection;
use App\Http\Resources\Profile\ShowProfilCollection;
use App\Mybid;
use App\Post;
use App\Protofolio;
use App\Saved_Job;
use App\Url;
use App\User;
use App\User_info;
use App\Experience;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
        $this->middleware('getLong');

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
         Storage::disk('azure')->put($name,$img,'public');
         $url = Storage::disk('azure')->url($name);
         $imageid = \App\Image::create(['path'=>$url,'name'=>$name]);
         $request['data'] = $imageid->id;
         $oldimg = public_path('store/images/'. $name );
         if(file_exists($oldimg)){
             unlink($oldimg);
         }
         $img = \App\Image::find($user->user_image);
         if($img){
             $oldimg = public_path( $img->path );
             if(file_exists($oldimg)){
                 unlink($oldimg);
                 $img->delete();
             }
             Storage::disk('azure')->delete($img->name);
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
            Storage::disk('azure')->put($name,$img,'public');
            $url = Storage::disk('azure')->url($name);
            $imageid = \App\Image::create(['path'=>$url,'name'=>$name]);

            $request['data'] = $imageid->id;
            $oldimg = public_path('store/images/'. $name );
            if(file_exists($oldimg)){
                unlink($oldimg);
            }
            $img = \App\Image::find($user->user_backgroundImage);
            if($img){
                $oldimg = public_path( $img->path );
                if(file_exists($oldimg)){
                    unlink($oldimg);
                    $img->delete();
                }
                Storage::disk('azure')->delete($img->name);
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
    public  function  getEduc(){
        $educ = Education::latest()->orderBy('id')->where('user_id',auth('api')->id())->paginate(5);
        return $educ;
    }
    public  function  addEduc(Request $request){
        $this->validate($request,[
            'Description'=>'required|min:50',
            'from'=>'required|date',
            'to'=>'required|date',
            'school'=>'required|max:150'

        ]);
        $educ=   Education::create(['school'=>$request->school,'description'=>$request->Description,'user_id'=>auth('api')->id(),'from'=>$request->from,'to'=>$request->to]);
        if($educ){
            return ['brikol'=>'(:'];
        }else{
            return ['brikol'=>'):'];
        }
    }

    public  function UpdateEduc(Request $request){
        $this->validate($request,[
            'Description'=>'required|min:50',
            'from'=>'required|date',
            'to'=>'required|date',
            'school'=>'required|max:150'

        ]);
        $educ = Education::where('user_id',auth('api')->id())->where('id',$request->EducId);
        if($educ){
            $educ->update(['school'=>$request->school,'description'=>$request->Description,'from'=>$request->from,'to'=>$request->to]);
            return ['brikol'=>'(:'];
        }else{
            return ['brikol'=>'):'];
        }
    }
    public  function  DeleteEduc(Request $request){
        $educ = Education::where('user_id',auth('api')->id())->where('id',$request->EducId);
        if($educ){
            $educ->delete();
            return ['brikol'=>'(:'];
        }else{
            return ['brikol'=>'):'];
        }
    }
    public  function getLocation(){
        $user = auth('api')->user();
        if($user['city_id']){
       return  $city = City::where('id',$user['city_id'])->paginate(1);
        }
    }
    public  function  addLocation(Request $request){
        if($request){
            City::findOrFail($request->City);
         $user =   User::where(['id'=>auth('api')->id()]);
          $user->update(['city_id'=>$request->City]);
            return ['brikol'=>'(:'];
        }

        return ['brikol'=>'):'];
    }

    public  function  getPortfolio(){
            $prot = Protofolio::where('user_id',auth('api')->id())->paginate(12);
         return   ProtfolioCollection::collection($prot);
    }
    public  function addProt(Request $request){
        $this->validate($request,[
            'path'=>'required',
        ]);
        if($request->path){
            $name = time() . '.'  . explode('/',explode(':',substr($request->path,0,strpos($request->path,';')))[1])[1];
            $img =   Image::make($request->path)->save(public_path('store/images/').$name);
//            $img->resize('1600','500')->save(public_path('store/images/').$name);
            Storage::disk('azure')->put($name,$img,'public');
            $url = Storage::disk('azure')->url($name);
            $imageid = \App\Image::create(['path'=>$url,'name'=>$name]);

            $request['path'] = $imageid->id;
            $oldimg = public_path('store/images/'. $name );
            if(file_exists($oldimg)){
                unlink($oldimg);
            }

            if($imageid){
                return    Protofolio::create(['image_id'=>$imageid->id,'user_id'=>auth('api')->id()]);
            }
        }

            return $request->all();
    }

    public  function  DeleteProt(Request $request){

        $id =  $request->profId;
        $p =  Protofolio::findOrFail($id)->first();
        $image_id =  $p['image_id'];
        $img = \App\Image::findOrFail($image_id)->first();
        Storage::disk('azure')->delete($img->name);
        $p->delete();
        $img->delete();
    }

    public function getUrl(){
      return  $usr = Url::where('user_id',auth('api')->id())->paginate(15);

    }

    public  function AddUrl(Request $request){
        $this->validate($request,[
            'url'=>'required|unique:urls'
        ]);
        $slice = Str::between($request->url, 'www.', '.com');
        $cont = Str::contains($request->url, $slice);
        $icon = 'la la-globe';
        if($cont && $slice == 'facebook'){
            $icon = 'fa fa-facebook-square';
        }
        if($cont && $slice == 'twitter'){
            $icon = 'fa fa-twitter';
        }
        if($cont && $slice == 'googleplus'){
            $icon = 'fa fa-google-plus-square';
        } if($cont && $slice == 'youtube'){
            $icon = 'fa fa-youtube';
        }
        if($cont && $slice == 'behance'){
            $icon = 'fa fa-behance-square';
        }
        if($cont && $slice == 'pinterest'){
            $icon = 'fa fa-pinterest';
        }
        if($cont && $slice == 'instagram'){
            $icon = 'fa fa-instagram';
        }
        Url::create(['url'=>$request->url,'icon'=>$icon,'user_id'=>auth('api')->id()]);

    }
    public function DeleteUrl(Request $request){
        $url = Url::where('url',$request->url)->where('user_id',auth('api')->id());
        $url->delete();
    }

    public function AddBio(Request $request){
        $this->validate($request,[
            'bio'=>'required'
        ]);
        $user = User::where('id',auth('api')->id());
        $user->update(['bio'=>$request->bio]);
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
    public function show($slug)
    {
         $user =   User::where('slug',$slug)->paginate(1);
         if(count($user) > 0)
        return ShowProfilCollection::collection($user);
         else
             return response(['error'=>true,'not found'=>'User Not Found'],404);
    }
    public  function  showProfileFeeds($slug){

        $post =  Post::latest()->orderBy('id')->where('user_id',User::UserId($slug))->paginate(5);
        return PostCollection::collection($post);
    }

    public  function  showoverview($slug){
        $overview =  User_info::where('user_id',User::UserId($slug))->paginate(1);
        return $overview;
    }
    public  function  showexp($slug){
        $exp = Experience::latest()->orderBy('id')->where('user_id',User::UserId($slug))->paginate(5);
        return $exp;
    }
    public  function  showeduc($slug){
        $educ = Education::latest()->orderBy('id')->where('user_id',User::UserId($slug))->paginate(5);
        return $educ;
    }
    public  function  showloac($slug){
        $user = User::where('id',User::UserId($slug))->first();
        if($user['city_id']){
            return  $city = City::where('id',$user['city_id'])->paginate(1);
        }
    }

    public  function  showportload($slug){
        $prot = Protofolio::where('user_id',User::UserId($slug))->paginate(12);
        return   ProtfolioCollection::collection($prot);
    }

    public  function  follow(Request $request){
        $user = User::findOrFail(User::UserId($request->slug));
        $response = auth('api')->user()->toggleFollow($user);
        $isfollow =   auth('api')->user()->isFollowing($user);
             if($isfollow){
                 return ['msg'=>'follow'];
             }else{
                 return ['msg'=>'unfollow'];
             }
    }

    public  function  userforfolw(){
        $user =   User::where('id',auth('api')->id())->paginate(1);
        return   ShowProfilCollection::collection($user);
    }

    public function fetchuser(){
        $user_id = auth('api')->id();
        $user =     User::where('id',$user_id)->paginate(1);
        if(count($user) > 0){
            return ShowProfilCollection::collection($user);
        }
        return false;
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
