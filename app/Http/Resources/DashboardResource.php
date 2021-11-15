<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DashboardResource extends JsonResource
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
            'username' => $this->user->username,
            'status' => $this->status_complaint,
            'created' => $this->created_at->format('d F Y')
        ];
    }
}
