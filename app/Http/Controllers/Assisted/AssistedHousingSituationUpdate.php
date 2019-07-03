<?php

namespace App\Http\Controllers\Assisted;

use App\Http\Controllers\Controller;
use App\Http\Requests\Assisted\UpdateHousingSituationRequest;
use App\Models\Assisted;
use App\Utils\LogActivity\LogActivityUtil;

class AssistedHousingSituationUpdate extends Controller
{
    /**
     * @param UpdateHousingSituationRequest $request
     * @param Assisted $assisted
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(UpdateHousingSituationRequest $request, Assisted $assisted)
    {
        $assisted->update($request->all());

        try {
            $assisted->save();
            LogActivityUtil::register($request->user(), "Situação habitacional do(a) assistido $assisted->name atualizado");

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
