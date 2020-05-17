<?php

namespace App\Http\Resources\Profile;

use Illuminate\Http\Resources\Json\JsonResource;

class UserProfile extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_image' =>$this->user_image ? $this->image->path : '',
            'background_image' =>$this->user_backgroundImage ? $this->backimage->path : '',
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'city' => $this->city ? $this->city->city_name : '',
            'category' => $this->category ?$this->category->category_name : '',
            'is_active' => $this->is_active,
            'gander'=>$this->gander,
            'is_online' => $this->is_online,
        ];
    }
}
