<?php

namespace App\Http\Controllers\FamilyComposition;

use App\Forms\FamilyComposition\FamilyCompositionForm;
use App\Http\Controllers\Controller;

class FamilyCompositionCreate extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        $form = $this->formBuilder->create(FamilyCompositionForm::class, [
            'url' => route('familyCompositions.store'),
            'method' => 'POST'
        ]);

        return view('familyCompositions.create', [
            'form' => $form
        ]);
    }
}
