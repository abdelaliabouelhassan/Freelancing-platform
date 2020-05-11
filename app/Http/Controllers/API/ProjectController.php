<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

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

        if($request->image){
            $name = time() . '.'  . explode('/',explode(':',substr($request->img,0,strpos($request->img,';')))[1])[1];
            \Image::make($request->img)->save(public_path('images/').$name);
            $request['image'] = $name;

        }else{
            $request['image'] = '1';
        }


        Post::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'category_id'=>$request->category,
            'city_id'=>$request->city,
            'user_id'=>auth()->id(),
            'price'=>$request->price,
            'type'=>'servic',
            'image_id'=>$request->image,
        ]);

        return $request->all();
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
