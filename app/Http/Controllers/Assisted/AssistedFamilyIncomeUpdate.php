<?php

namespace App\Http\Controllers\Assisted;

use App\Http\Controllers\Controller;
use App\Http\Requests\FamilyIncome\UpdateRequest;
use App\Models\Assisted;

class AssistedFamilyIncomeUpdate extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param Assisted $assisted
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(UpdateRequest $request, Assisted $assisted)
    {
        $assisted->update($request->all());

        try {
            $assisted->save();

            return redirect()
                ->route('assisteds.show', $assisted->id)
                ->with('alert-success', 'Renda familiar atualizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha na atualização da renda familiar!');
        }
    }
}
