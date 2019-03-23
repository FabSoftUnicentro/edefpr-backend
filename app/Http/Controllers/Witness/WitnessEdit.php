<?php

namespace App\Http\Controllers\Witness;

use App\Forms\Witnesses\WitnessesForm;
use App\Http\Controllers\Controller;
use App\Models\Witness;

class WitnessEdit extends Controller
{
    /**
     * @param Witness $witness
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Witness $witness)
    {
        $form = $this->formBuilder->create(WitnessesForm::class, [
            'url' => route('witnesses.update', $witness->id),
            'method' => 'PUT',
            'model' => $witness
        ]);

        return view('witnesses.edit', [
            'form' => $form
        ]);
    }
}
