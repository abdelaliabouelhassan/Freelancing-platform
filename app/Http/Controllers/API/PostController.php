<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\City;
use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostCollection;
use App\Http\Resources\Post\PostResource as PostPostResource;
use App\Http\Resources\PostResource;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Stevebauman\Location\Facades\Location;
class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function __construct()
//    {
//        $this->middleware('auth:api');
//    }

    public function index()
    {
        if(auth('api')->check())
        {
            $user = auth('api')->user();
            if($user->city_id != ''){
                $post = Post::latest()->orderBy('id')->where('type','job')->where('is_done','false')->where('city_id',$user->city_id)->paginate(5);
                if(count($post) != 0){
                    $post;
                }else{
                    return PostCollection::collection(Post::latest()->orderBy('id')->where('type','job')->where('is_done','false')->paginate(5));
                }
            }else{
                $myid =\App\Helpers\AppHelper::get_client_ip();
                $data = Location::get($myid);
                $city =   City::where('city_name',$data->cityName)->first();
                if($city){
                    $city_id = $city->id;
                }else{
                    $city_id = 0;
                }
                $post =   Post::latest()->orderBy('id')->where('type','job')->where('is_done','false')->where('city_id',$city_id)->paginate(5);
                if(count($post) != 0){
                    return PostCollection::collection($post);
                }else{
                    return PostCollection::collection(Post::latest()->orderBy('id')->where('type','job')->where('is_done','false')->paginate(5));
                }
            }

        }
        else
        {
            $myid =\App\Helpers\AppHelper::get_client_ip();
            $data = Location::get($myid);
            $city =   City::where('city_name',$data->cityName)->first();
            if($city){
              $city_id = $city->id;
            }else{
                $city_id = 0;
            }
            $post =   Post::latest()->orderBy('id')->where('type','job')->where('is_done','false')->where('city_id',$city_id)->paginate(5);
            if(count($post) != 0){
                return PostCollection::collection($post);
            }else{
                return PostCollection::collection(Post::latest()->orderBy('id')->where('type','job')->where('is_done','false')->paginate(5));
            }

        }
    }

    public function  category(){
        $count = Category::all();
        $count = count($count);
        $category =  Category::orderBy('id')->paginate($count);
        return   $category;
    }
    public function  city(){
        $count = City::all();
        $count = count($count);
        $city = City::orderBy('id')->paginate($count);
        return $city;
    }

public  function filter($cat,$city,$price,$isdone){


        if($price== 1){
            $min = 10;
            $max = 100;
        }
        elseif ($price== 2){
            $min = 100;
            $max = 500;
        }
        elseif ($price== 3){
            $min = 500;
            $max = 1000;
        }
        elseif ($price== 4){
            $min = 1000;
            $max = 100000000;
        }

if($city == 0 && $cat == 0 && $price == 0 && $isdone == 3){
    $count =  Post::all()->where('type','job')->where('is_done','false');
    $count = count($count);
    return PostCollection::collection(Post::latest()->orderBy('id')->where('type','job')->where('is_done','false')->paginate($count));
}
elseif($city != 0 && $cat != 0 && $price != 0 && $isdone != 3){
    $count = Post::all()->where('category_id',$cat)->where('is_done',$isdone)->whereBetween('price', [$min, $max])->where('city_id',$city)->where('type','job');
    $count = count($count);
    return PostCollection::collection(Post::latest()->orderBy('id')->where('category_id',$cat)->where('is_done',$isdone)->whereBetween('price', [$min, $max])->where('city_id',$city)->where('type','job')->paginate($count));


}
elseif ($city == 0 && $cat != 0  && $price == 0 && $isdone == 3) {
    $count = Post::all()->where('category_id',$cat)->where('is_done',0)->where('type','job');
    $count = count($count);
  return  PostCollection::collection(Post::latest()->orderBy('id')->where('category_id',$cat)->where('is_done',0)->where('type','job')->paginate($count));

}
elseif ($city != 0 && $cat == 0 && $price == 0 && $isdone == 3){
    $count = Post::all()->where('city_id',$city)->where('is_done',0)->where('type','job');
    $count = count($count);
    return   PostCollection::collection(Post::latest()->orderBy('id')->where('city_id',$city)->where('is_done',0)->where('type','job')->paginate($count));
}
elseif ($city == 0 && $cat == 0 && $price != 0 && $isdone == 3){
    $count = Post::all()->where('is_done',0)->whereBetween('price', [$min, $max])->where('type','job');
    $count = count($count);
    return PostCollection::collection(Post::latest()->orderBy('id')->where('is_done',0)->whereBetween('price', [$min, $max])->where('type','job')->paginate($count));
}
elseif ($city == 0 && $cat == 0 && $price == 0 && $isdone != 3){
    $count = Post::all()->where('is_done',$isdone)->where('type','job');
    $count = count($count);
    return   PostCollection::collection(Post::latest()->orderBy('id')->where('is_done',$isdone)->where('type','job')->paginate($count));
}
    if($cat != 0 && $city != 0 && $price == 0 && $isdone == 3){
        $count = Post::all()->where('category_id',$cat)->where('city_id',$city)->where('type','job');
        $count = count($count);
        return  PostCollection::collection(Post::latest()->orderBy('id')->where('category_id',$cat)->where('city_id',$city)->where('type','job')->paginate($count));
    }
    elseif ($cat != 0 && $price != 0 && $city == 0 && $isdone == 3){
        $count = Post::all()->where('category_id',$cat)->whereBetween('price', [$min, $max])->where('type','job');
        $count = count($count);
        return  PostCollection::collection(Post::latest()->orderBy('id')->where('category_id',$cat)->whereBetween('price', [$min, $max])->where('type','job')->paginate($count));
    }
    elseif ($cat == 0 && $price != 0 && $city != 0 && $isdone == 3){
        $count = Post::all()->whereBetween('price', [$min, $max])->where('city_id',$city)->where('type','job');
        $count = count($count);
        return  PostCollection::collection(Post::latest()->orderBy('id')->whereBetween('price', [$min, $max])->where('city_id',$city)->where('type','job')->paginate($count));
    }
    elseif ($cat != 0 && $price == 0 && $city == 0 && $isdone != 3){
        $count = Post::all()->where('category_id',$cat)->where('is_done',$isdone)->where('type','job');
        $count = count($count);
        return  PostCollection::collection(Post::latest()->orderBy('id')->where('category_id',$cat)->where('is_done',$isdone)->where('type','job')->paginate($count));
    }
    elseif ($cat == 0 && $price != 0 && $city == 0 && $isdone != 3){
        $count = Post::all()->whereBetween('price', [$min, $max])->where('is_done',$isdone)->where('type','job');
        $count = count($count);
        return  PostCollection::collection(Post::latest()->orderBy('id')->whereBetween('price', [$min, $max])->where('is_done',$isdone)->where('type','job')->paginate($count));
    }
    elseif ($cat == 0 && $price == 0 && $city != 0 && $isdone != 3){
        $count = Post::all()->where('city_id',$city)->where('is_done',$isdone)->where('type','job');
        $count = count($count);
        return  PostCollection::collection(Post::latest()->orderBy('id')->where('city_id',$city)->where('is_done',$isdone)->where('type','job')->paginate($count));
    }
    elseif ($cat != 0 && $price != 0 && $city == 0 && $isdone != 3){
        $count = Post::all()->where('category_id',$cat)->where('is_done',$isdone)->whereBetween('price', [$min, $max])->where('type','job');
        $count = count($count);
        return  PostCollection::collection(Post::latest()->orderBy('id')->where('category_id',$cat)->where('is_done',$isdone)->whereBetween('price', [$min, $max])->where('type','job')->paginate($count));
    }
    elseif ($cat == 0 && $price != 0 && $city != 0 && $isdone != 3){
        $count = Post::all()->where('city_id',$city)->where('is_done',$isdone)->whereBetween('price', [$min, $max])->where('type','job');
        $count = count($count);
        return  PostCollection::collection(Post::latest()->orderBy('id')->where('city_id',$city)->where('is_done',$isdone)->whereBetween('price', [$min, $max])->where('type','job')->paginate($count));
    }
    elseif ($cat != 0 && $price == 0 && $city != 0 && $isdone != 3){
        $count =  Post::all()->where('city_id',$city)->where('is_done',$isdone)->where('category_id',$cat)->where('type','job');
        $count = count($count);
        return  PostCollection::collection(Post::latest()->orderBy('id')->where('city_id',$city)->where('is_done',$isdone)->where('category_id',$cat)->where('type','job')->paginate($count));
    }
    elseif ($cat != 0 && $price != 0 && $city != 0 && $isdone == 3){
        $count = Post::all()->where('city_id',$city)->whereBetween('price', [$min, $max])->where('category_id',$cat)->where('type','job');
        $count = count($count);
        return  PostCollection::collection(Post::latest()->orderBy('id')->where('city_id',$city)->whereBetween('price', [$min, $max])->where('category_id',$cat)->where('type','job')->paginate($count));
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
    public function show(Post $post)
    {
        return new PostPostResource($post);
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
       return  auth('api')->user();
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
