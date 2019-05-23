<?php

namespace App\Http\Requests\AssistedAsset;

use App\Http\Requests\BaseRequest;
use App\Http\Requests\Filter\CurrencyFilter;

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
            'price' => 'string',
            'installment_price' => 'string',
            'rental_value' => 'string'
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
            'price' => 'currencyFilter',
            'installment_price' => 'currencyFilter',
            'rental_value' => 'currencyFilter'
        ];
    }
}
