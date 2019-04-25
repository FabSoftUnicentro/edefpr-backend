<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Witness extends JsonResource
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
            'cpf' => $this->cpf,
            'rg' => $this->rg,
            'rg_issuer' => $this->rg_issuer,
            'addresses' => json_decode($this->addresses, true)
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
