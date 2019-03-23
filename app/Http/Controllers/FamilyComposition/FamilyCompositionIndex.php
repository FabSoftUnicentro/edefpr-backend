<?php

namespace App\Http\Controllers\FamilyComposition;

use App\Http\Controllers\Controller;
use App\Models\Assisted;
use App\Models\FamilyComposition;
use Illuminate\Http\Request;

class FamilyCompositionIndex extends Controller
{
    private $itemsPerPage = 10;

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $perPage = $request->query->get('perPage', $this->itemsPerPage);

        $familyCompositions = FamilyComposition::paginate($perPage);

        foreach($familyCompositions as $familyComposition) {
            $familyComposition->assisted_name = Assisted::findOrFail($familyComposition->assisted_id)->name;
        }

        return view('familyCompositions.index', [
            'familyCompositions' => $familyCompositions
        ]);
    }
}
