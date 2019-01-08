<?php

namespace App\Http\Requests\Assisted;

use App\Http\Requests\BaseRequest;

class UpdateRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string',
            'email' => 'email|unique:assisteds',
            'cpf' => 'unique:assisteds',
            'rg' => 'string',
            'rg_issuer' => 'string',
            'gender' => 'string',
            'note' => 'string',
            'profession' => 'string'
        ];
    }
}
