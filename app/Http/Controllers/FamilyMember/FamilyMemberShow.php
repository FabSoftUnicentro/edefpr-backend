<?php

namespace App\Http\Controllers\FamilyMember;

use App\Http\Controllers\Controller;
use App\Models\FamilyMember;

class FamilyMemberShow extends Controller
{
    /**
     * @param FamilyMember $familyMember
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(FamilyMember $familyMember)
    {
        return view('familyMembers.show', [
            'familyMember' => $familyMember
        ]);
    }
}
