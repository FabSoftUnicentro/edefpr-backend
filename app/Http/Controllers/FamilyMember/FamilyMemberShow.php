<?php

namespace App\Http\Controllers\FamilyComposition;

use App\Http\Controllers\Controller;
use App\Models\Assisted;
use App\Models\FamilyMember;

class FamilyMemberShow extends Controller
{
    /**
     * @param FamilyMember $familyComposition
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(FamilyMember $familyComposition)
    {
        $familyComposition->assisted_name = Assisted::findOrFail($familyComposition->assisted_id)->name;

        return view('familyCompositions.show', [
            'familyComposition' => $familyComposition
        ]);
    }
}
