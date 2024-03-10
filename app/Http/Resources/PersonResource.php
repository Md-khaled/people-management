<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'email' => $this->email_address,
            'name' => $this->name,
            'birthday' => $this->birthday,
            'phone' => $this->phone,
            'ip' => $this->ip,
            'country' => $this->country,
        ];
    }
}
