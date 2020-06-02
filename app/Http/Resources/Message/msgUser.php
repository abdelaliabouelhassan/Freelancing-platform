<?php

namespace App\Http\Resources\Message;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class msgUser extends JsonResource
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
            'id'=>$this->id,
            'slug'=>$this->slug,
            'image'=>$this->user_image ? $this->image->path : '',
            'username'=>$this->name,
        ];
    }
}
