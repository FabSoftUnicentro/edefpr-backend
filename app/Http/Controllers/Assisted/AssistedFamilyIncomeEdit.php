<?php

namespace App\Http\Controllers\FamilyIncome;

use App\Forms\FamilyIncome\AssistedFamilyIncomeForm;
use App\Http\Controllers\Controller;
use App\Models\FamilyIncome;

class FamilyIncomeEdit extends Controller
{
    /**
     * @param FamilyIncome $familyIncome
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(FamilyIncome $familyIncome)
    {
        $form = $this->formBuilder->create(AssistedFamilyIncomeForm::class, [
            'url' => route('familyIncomes.update', $familyIncome->id),
            'method' => 'PUT',
            'model' => $familyIncome
        ]);

        return view('familyIncomes.edit', [
            'form' => $form
        ]);
    }
}
