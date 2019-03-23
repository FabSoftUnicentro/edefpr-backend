<?php

namespace App\Http\Controllers\FamilyComposition;

use App\Forms\FamilyComposition\FamilyCompositionForm;
use App\Http\Controllers\Controller;
use App\Models\FamilyComposition;

class FamilyCompositionEdit extends Controller
{
    /**
     * @param FamilyComposition $familyComposition
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(FamilyComposition $familyComposition)
    {
        $form = $this->formBuilder->create(FamilyCompositionForm::class, [
            'url' => route('familyCompositions.update', $familyComposition->id),
            'method' => 'PUT',
            'model' => $familyComposition
        ]);

        return view('familyCompositions.edit', [
            'form' => $form
        ]);
    }
}
