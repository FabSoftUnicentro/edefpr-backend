<?php

namespace App\Http\Controllers\FamilyComposition;

use App\Http\Controllers\Controller;
use App\Models\Assisted;
use App\Models\FamilyComposition;

class FamilyCompositionShow extends Controller
{
    /**
     * @param FamilyComposition $familyComposition
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(FamilyComposition $familyComposition)
    {
        $familyComposition->assisted_name = Assisted::findOrFail($familyComposition->assisted_id)->name;

        return view('familyCompositions.show', [
            'familyComposition' => $familyComposition
        ]);
    }
}
