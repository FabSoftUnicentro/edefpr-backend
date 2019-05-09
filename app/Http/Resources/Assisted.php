<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Assisted extends JsonResource
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
            'email' => $this->email,
            'cpf' => $this->cpf,
            'birth_date' => $this->birth_date,
            'birthplace' => $this->birthplace,
            'rg' => $this->rg,
            'rg_issuer' => $this->rg_issuer,
            'gender' => $this->gender,
            'marital_status' => $this->marital_status,
            'profession' => $this->profession,
            'note' => $this->note,
            'social_programs' => $this->social_programs,
            'social_security_contribution' => $this->social_security_contribution,
            'income_tax' => $this->income_tax,
            'alimony' => $this->alimony,
            'extraordinary_expenses' => $this->extraordinary_expenses,
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
