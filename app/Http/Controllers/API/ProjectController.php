<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\City;
use App\Http\Controllers\Controller;
use App\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProjectController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'title'=>'required|max:100',
            'body'=>'required|min:20',
            'city'=>'required|not_in:0',
            'price'=>'required|not_in:0|integer',
            'category'=>'required|not_in:0',
        ]);

        Category::findOrFail($request->category);
        City::findOrFail($request->city);
        if($request->image){
            $name = time() . '.'  . explode('/',explode(':',substr($request->image,0,strpos($request->image,';')))[1])[1];
            $img =   Image::make($request->image);
            $img->resize('500','500')->save(public_path('store/images/').$name);
            Storage::disk('azure')->put($name,$img,'public');
            $url = Storage::disk('azure')->url($name);
            $imageid = \App\Image::create(['path'=>$url,'name'=>$name]);
            $request['image'] = $imageid->id;
            $oldimg = public_path('store/images/'. $name );
            if(file_exists($oldimg)){
                unlink($oldimg);
            }
        }
        Post::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'category_id'=>$request->category,
            'city_id'=>$request->city,
            'user_id'=>auth('api')->id(),
            'price'=>$request->price,
            'type'=>'servic',
            'image_id'=>$request->image,
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
        ]);

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
