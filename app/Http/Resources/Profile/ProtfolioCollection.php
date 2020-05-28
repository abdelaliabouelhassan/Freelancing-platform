<?php

namespace App\Http\Resources\Profile;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class ProtfolioCollection extends JsonResource
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
            'path'=>$this->image_id ? $this->image->path : '',
        ];
    }
}
