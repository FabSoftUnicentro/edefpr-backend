<?php

namespace App\Http\Controllers\FamilyComposition;

use App\Forms\FamilyComposition\FamilyCompositionForm;
use App\Http\Controllers\Controller;
use App\Models\FamilyMember;

class FamilyMemberEdit extends Controller
{
    /**
     * @param FamilyMember $familyComposition
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(FamilyMember $familyComposition)
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
