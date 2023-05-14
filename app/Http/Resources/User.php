<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;
class User extends JsonResource
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'username' => $this->username,
            'email' => $this->email,
            'phone' => $this->phone,
            'session_expired' => $this->session_expired,
            'active' => $this->active,
            'blood_type_id' => $this->blood_type_id,
            'location_id' => $this->location_id,
            'location_type' => $this->location_type,
            'imageUrl' => $this->getImageUrl(),
            'location_info' => $this->getLocation(),
            'created_at' => $this->created_at,

        ];



    }

    public function with($request)
    {
        return [
            'status' => 'success'
        ];
    }
}
