<?php


namespace App\Http\Resources\Profile;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class ShowProfilCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->user_image ? $this->image->path : '',
            'backimage' => $this->user_backgroundImage ? $this->backimage->path : '',
            'slug' => $this->slug,
            'bio' => $this->bio,
            'ismy'=>$this->id === auth('api')->id() ? true : false,
        ];
    }
}
