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
        $assisted->social_programs = money($assisted->social_programs);
        $assisted->social_security_contribution = money($assisted->social_security_contribution);
        $assisted->income_tax = money($assisted->income_tax);
        $assisted->alimony = money($assisted->alimony);
        $assisted->extraordinary_expenses = money($assisted->extraordinary_expenses);

        $form = $this->formBuilder->create(AssistedFamilyIncomeForm::class, [
            'url' => route('assistedsFamilyIncomes.update', $assisted->id),
            'method' => 'PUT',
            'model' => $assisted
        ]);

        return view('assisteds.editFamilyIncome', [
            'form' => $form
        ]);
    }
}
