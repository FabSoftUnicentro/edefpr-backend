<?php

namespace App\Http\Controllers\FamilyComposition;

use App\Http\Controllers\Controller;
use App\Http\Resources\familyComposition as FamilyCompositionResource;
use App\Models\FamilyMember;

class FamilyMemberDestroy extends Controller
{
    /**
     * @param FamilyMember $familyComposition
     * @return familyCompositionResource
     * @throws \Exception
     */
    public function __invoke(FamilyMember $familyComposition)
    {
        $familyComposition->delete();

        return new FamilyCompositionResource($familyComposition);
    }
}
