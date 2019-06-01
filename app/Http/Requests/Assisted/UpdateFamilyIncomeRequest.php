<?php

namespace App\Http\Requests\Assisted;

use App\Http\Requests\BaseRequest;

class UpdateFamilyIncomeRequest extends BaseRequest
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
            'social_programs' => 'string',
            'social_security_contribution' => 'string',
            'income_tax' => 'string',
            'alimony' => 'string',
            'extraordinary_expenses' => 'string'
        ];
    }

    /**
     * Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            'social_programs' => 'currencyFilter',
            'social_security_contribution' => 'currencyFilter',
            'income_tax' => 'currencyFilter',
            'alimony' => 'currencyFilter',
            'extraordinary_expenses' => 'currencyFilter'
        ];
    }
}
