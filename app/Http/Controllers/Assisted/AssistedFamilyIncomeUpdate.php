<?php

namespace App\Http\Controllers\Assisted;

use App\Http\Controllers\Controller;
use App\Http\Requests\Assisted\UpdateFamilyIncomeRequest;
use App\Models\Assisted;
use App\Utils\LogActivity\LogActivityUtil;

class AssistedFamilyIncomeUpdate extends Controller
{
    /**
     * @param UpdateFamilyIncomeRequest $request
     * @param Assisted $assisted
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(UpdateFamilyIncomeRequest $request, Assisted $assisted)
    {
        $assisted->update($request->all());

        try {
            $assisted->save();
            LogActivityUtil::register($request->user(), "Renda familiar do(a) assistido $assisted->name atualizado");

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
