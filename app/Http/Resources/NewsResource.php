<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
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
            'user' => $this->user,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'rate' => $this->rate,
            'picture_path' => $this->picture_path,
            'date' => $this->created_at->format('d F Y'),
            'category' => $this->categories
        ];
    }
}
