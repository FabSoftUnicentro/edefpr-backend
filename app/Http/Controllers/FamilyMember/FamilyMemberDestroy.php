<?php

namespace App\Http\Controllers\FamilyMember;

use App\Http\Controllers\Controller;
use App\Http\Resources\FamilyMember as FamilyMemberResource;
use App\Models\FamilyMember;

class FamilyMemberDestroy extends Controller
{
    /**
     * @param FamilyMember $familyMember
     * @return FamilyMemberResource
     * @throws \Exception
     */
    public function __invoke(FamilyMember $familyMember)
    {
        $familyMember->delete();

        return new FamilyMemberResource($familyMember);
    }
}
