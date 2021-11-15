<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComplaintSingleResource extends JsonResource
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
            'slug' => $this->slug,
            'mitra_type' => $this->mitra_type,
            'problem' => $this->problem,
            'description' => $this->description,
            'support_image' => $this->support_image,
            'status_complaint' => $this->status_complaint,
        ];
    }
}
