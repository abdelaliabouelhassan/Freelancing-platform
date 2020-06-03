<?php

namespace App\Http\Resources\Message;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class fetchMessages extends JsonResource
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
            'user_id'=>$this->user->id,
            'message'=>$this->message,
            'username'=>$this->user->name,
            'created_at'=>Carbon::createFromFormat('Y-m-d H:i:s',$this->created_at)->diffForHumans(),
            'image'=>$this->user->user_image ? $this->user->image->path : ''

        ];
    }
}
