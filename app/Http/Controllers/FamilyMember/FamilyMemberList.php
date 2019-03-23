<?php

namespace App\Http\Controllers\FamilyComposition;

use App\Http\Controllers\Controller;
use App\Http\Resources\FamilyComposition as FamilyCompositionResource;
use App\Models\FamilyMember;

class FamilyMemberList extends Controller
{
    private $itemsPerPage = 10;

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function __invoke()
    {
        $familyCompositions = FamilyMember::paginate($this->itemsPerPage);

        return FamilyCompositionResource::collection($familyCompositions);
    }
}
