<?php

namespace App\Http\Controllers\FamilyMember;

use App\Http\Controllers\Controller;
use App\Http\Resources\FamilyMember as FamilyMemberResource;
use App\Models\FamilyMember;

class FamilyMemberDestroy extends Controller
{
    /**
     * @param FamilyMember $familyComposition
     * @return FamilyMemberResource
     * @throws \Exception
     */
    public function __invoke(FamilyMember $familyComposition)
    {
        $familyComposition->delete();

        return new FamilyMemberResource($familyComposition);
    }
}
