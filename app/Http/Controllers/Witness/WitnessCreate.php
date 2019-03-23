<?php

namespace App\Http\Controllers\Witness;

use App\Forms\Witnesses\WitnessesForm;
use App\Http\Controllers\Controller;

class WitnessCreate extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        $form = $this->formBuilder->create(WitnessesForm::class, [
            'url' => route('witnesses.store'),
            'method' => 'POST'
        ]);

        return view('witnesses.create', [
            'form' => $form
        ]);
    }
}
