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
            'image_id' => $this->image_id,
            'category_id' => $this->category_id,
            'price' => $this->price,
            'type' => $this->type,
            'create_at' => $this->updated_at,
            'user_name' => $this->user->name,
            'city_name' => $this->city->name,
            'image_path' => $this->image->path,
            'is_done' => $this->is_done,
            'category_name' => $this->category->category_name,
        ];
    }
}
