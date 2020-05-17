<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\City;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class JobController extends Controller
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
            Image::make($request->image)->save(public_path('store/images/').$name);
            $imageid = \App\Image::create(['path'=>'store/images/' . $name]);
            $request['image'] = $imageid->id;
        }
        Post::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'category_id'=>$request->category,
            'city_id'=>$request->city,
            'user_id'=>auth('api')->id(),
            'price'=>$request->price,
            'type'=>'job',
            'image_id'=>$request->image,
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
