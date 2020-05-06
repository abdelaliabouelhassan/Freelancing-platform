<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'created_at' => $this->created_at,
            'user_name' => $this->user->name,
            'city_name' => $this->city->city_name,
            'image_path' => $this->image->path,
            'is_done' => $this->is_done,
            'category_name' => $this->category->category_name,
        ];
    }
}
