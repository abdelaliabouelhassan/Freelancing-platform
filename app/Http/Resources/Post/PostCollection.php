<?php

namespace App\Http\Resources\Post;

use App\Saved_Job;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class PostCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
            'type' => $this->type,
            'created_at' =>Carbon::createFromFormat('Y-m-d H:i:s',$this->created_at)->diffForHumans() ,
            'user_name' => $this->user->name,
            'city_name' => $this->city->city_name,
            'post_image' => $this->image_id ? $this->image->path : '',
            'user_image'=>$this->user->image,
            'is_done' => $this->is_done,
            'slug'=>$this->user->slug,
            'postSlug'=>$this->slug,
            'IsSave'=>count(Saved_Job::where('user_id',auth('api')->id())->where('post_id',$this->id)->get()) == 0 ? false : true,
            'ismy'=>$this->user->id == auth('api')->id() ? true : false,
            'category_name' => $this->category->category_name,
        ];
    }
}
