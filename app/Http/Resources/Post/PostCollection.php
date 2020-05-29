<?php

namespace App\Http\Resources\Post;

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
            'category_name' => $this->category->category_name,
        ];
    }
}
