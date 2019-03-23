<?php

namespace App\Http\Controllers\FamilyComposition;

use App\Http\Controllers\Controller;
use App\Models\FamilyMember;
use Illuminate\Http\Request;

class FamilyMemberIndex extends Controller
{
    private $itemsPerPage = 10;

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $perPage = $request->query->get('perPage', $this->itemsPerPage);

        $familyCompositions = FamilyMember::paginate($perPage);

        return view('familyCompositions.index', [
            'familyCompositions' => $familyCompositions
        ]);
    }
}
