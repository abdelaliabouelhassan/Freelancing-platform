<?php

namespace App\Http\Resources\Profile;
use App\Saved_Job;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class SavedPostCollection extends JsonResource
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
                 'id'=>$this->post->id,
                 'username'=>$this->post->user->name,
                 'title'=>$this->post->title,
                 'time'=>Carbon::createFromFormat('Y-m-d H:i:s',$this->post->created_at)->diffForHumans(),
                 'city'=>$this->post->city->city_name,
                 'category'=>$this->post->category->category_name,
                 'body' => $this->post->body,
                 'price' => $this->post->price,
                 'type' => $this->post->type,
                 'post_image' => $this->post->image_id ? $this->post->image->path : '',
                 'user_image'=>$this->post->user->image,
                 'is_done' => $this->post->is_done,
                 'slug'=>$this->user->slug,
                 'postSlug'=>$this->post->slug,
        ];
    }
}
