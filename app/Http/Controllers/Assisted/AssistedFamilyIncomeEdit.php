<?php

namespace App\Http\Controllers\Assisted;

use App\Forms\Assisted\AssistedFamilyIncomeForm;
use App\Http\Controllers\Controller;
use App\Models\Assisted;

class AssistedFamilyIncomeEdit extends Controller
{
    /**
     * @param Assisted $assisted
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Assisted $assisted)
    {
        $assisted->social_programs = $this->mask($assisted->social_programs);
        $assisted->social_security_contribution = $this->mask($assisted->social_security_contribution);
        $assisted->income_tax = $this->mask($assisted->income_tax);
        $assisted->alimony = $this->mask($assisted->alimony);
        $assisted->extraordinary_expenses = $this->mask($assisted->extraordinary_expenses);

        $form = $this->formBuilder->create(AssistedFamilyIncomeForm::class, [
            'url' => route('assistedsFamilyIncomes.update', $assisted->id),
            'method' => 'PUT',
            'model' => $assisted
        ]);

        return view('assisteds.editFamilyIncome', [
            'form' => $form
        ]);
    }

    /**
     * @param $value
     * @return mixed|string
     */
    public function mask($value)
    {
        $maskedValue = number_format($value, 2);
        $maskedValue = str_replace(',', '$', $maskedValue);
        $maskedValue = str_replace('.', ',', $maskedValue);
        $maskedValue = str_replace('$', '.', $maskedValue);

        return $maskedValue;
    }
}
