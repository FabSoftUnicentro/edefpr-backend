<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Process extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'user_id' => $this->user_id,
            'assisted_id' => $this->assisted_id,
            'counter_part_id' => $this->counter_part_id
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
