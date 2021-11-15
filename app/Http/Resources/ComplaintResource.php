<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComplaintResource extends JsonResource
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
            'user' => $this->user->id,
            'name' => $this->user->name,
            'email' => $this->user->email,
            'mitra' => $this->user->mitra_type,
            'no_hp' => $this->user->phone_number,
            'slug' => $this->slug,
            'mitra_type' => $this->mitra_type,
            'problem' => $this->problem,
            'description' => $this->description,
            'support_image' => $this->support_image,
            'status_complaint' => $this->status_complaint, 
            'message' => $this->message,
            'created' => $this->created_at->format('d F Y'),
         
        ];
    }
}
