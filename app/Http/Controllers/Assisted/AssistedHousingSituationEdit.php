<?php

namespace App\Http\Controllers\Assisted;

use App\Forms\Assisted\AssistedHousingSituationForm;
use App\Http\Controllers\Controller;
use App\Models\Assisted;

class AssistedHousingSituationEdit extends Controller
{
    /**
     * @param Assisted $assisted
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Assisted $assisted)
    {
        $assisted->rental_value = money($assisted->rental_value);

        $form = $this->formBuilder->create(AssistedHousingSituationForm::class, [
            'url' => route('assistedsHousingSituation.update', $assisted->id),
            'method' => 'PUT',
            'model' => $assisted
        ]);

        return view('assisteds.editHousingSituation', [
            'form' => $form
        ]);
    }
}
