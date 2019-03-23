<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FamilyMember extends JsonResource
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
            'birth_date' => $this->birth_date,
            'work' => $this->work,
            'income' => $this->income,
            'legal_situation' => $this->legal_situation,
            'kinship' => $this->kinship,
            'assisted_id' => $this->assisted_id
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
