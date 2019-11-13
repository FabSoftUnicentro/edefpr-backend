<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Contact extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'uf' => $this->uf,
            'city' => $this->city,
            'number' => $this->number,
            'street' => $this->street,
            'postcode' => $this->postcode,
            'complement' => $this->complement,
            'neighborhood' => $this->neighborhood
        ];
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function with($request)
    {
        return [
            'version' => '1.0.0'
        ];
    }
}
