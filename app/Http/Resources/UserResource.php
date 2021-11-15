<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'mitra_type' => $this->mitra_type,
            'picture_path' => $this->picture_path,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'complaint' => $this->complaint

        ];
    }
}
