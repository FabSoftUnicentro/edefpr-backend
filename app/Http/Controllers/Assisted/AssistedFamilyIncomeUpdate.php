<?php

namespace App\Http\Controllers\FamilyIncome;

use App\Http\Controllers\Controller;
use App\Http\Requests\FamilyIncome\UpdateRequest;
use App\Models\FamilyIncome;
use Illuminate\Http\Request;

class FamilyIncomeUpdate extends Controller
{
    /**
     * @param Request $request
     * @param FamilyIncome $familyIncome
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(UpdateRequest $request, FamilyIncome $familyIncome)
    {
        $familyIncome->update($request->all());

        try {
            $familyIncome->save();

            return redirect()
                ->route('familyIncomes.show', $familyIncome->id)
                ->with('alert-success', 'Renda familiar atualizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha na atualização da renda familiar!');
        }
    }
}
