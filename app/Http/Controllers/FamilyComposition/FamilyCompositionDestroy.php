<?php

namespace App\Http\Controllers\FamilyComposition;

use App\Http\Controllers\Controller;
use App\Http\Resources\familyComposition as familyCompositionResource;
use App\Models\FamilyComposition;

class FamilyCompositionDestroy extends Controller
{
    /**
     * @param FamilyComposition $familyComposition
     * @return familyCompositionResource
     * @throws \Exception
     */
    public function __invoke(FamilyComposition $familyComposition)
    {
        $familyComposition->delete();

        return new familyCompositionResource($familyComposition);
    }
}
